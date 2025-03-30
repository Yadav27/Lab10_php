<?php

namespace App\Http\Controllers;

use App\Models\Well;
use Illuminate\Http\Request;

class WellController extends Controller
{
    // Display a list of all wells
    public function index(Request $request) // Add Request parameter here
    {
        $query = Well::query(); // Start a query builder instance

        // Search by well name or status
        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('well_name', 'like', "%{$request->search}%")
                  ->orWhere('status', 'like', "%{$request->search}%");
            });
        }

        // Filter by field_location
        if ($request->filled('field_location')) {
            $query->where('field_location', $request->field_location);
        }
        if ($request->filled('start_date') && $request->filled('end_date')) {
            $query->whereBetween('commissioned_date', [$request->start_date, $request->end_date]);
        }

        $wells = $query->get(); // Execute the query and get the results
        return view('wells.index', compact('wells'));
    }

    // Show the form for creating a new well
    public function create()
    {
        return view('wells.create');
    }

    // Save a new well to the database
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'well_name' => 'required|unique:wells',
            'field_location' => 'required',
            'depth_meters' => 'required|integer',
            'status' => 'required|in:Drilling,Producing,Suspended,Decommissioned',
            'production_bpd' => 'nullable|numeric',
            'commissioned_date' => 'required|date',
        ]);

        Well::create($validatedData);

        return redirect()->route('wells.index')
                         ->with('success', 'Well created successfully.');
    }

    // Display a specific well's information
    public function show(Well $well)
    {
        return view('wells.show', compact('well'));
    }

    // Show the form to edit a specific well
    public function edit(Well $well)
    {
        return view('wells.edit', compact('well'));
    }

    // Save updated well data to the database
    public function update(Request $request, Well $well)
    {
        $validatedData = $request->validate([
            'well_name' => 'required|unique:wells,well_name,' . $well->id,
            'field_location' => 'required',
            'depth_meters' => 'required|integer',
            'status' => 'required|in:Drilling,Producing,Suspended,Decommissioned',
            'production_bpd' => 'nullable|numeric',
            'commissioned_date' => 'required|date',
        ]);

        $well->update($validatedData);

        return redirect()->route('wells.index')
                         ->with('success', 'Well updated successfully.');
    }

    // Delete a specific well from the database
    public function destroy(Well $well)
    {
        $well->delete();

        return redirect()->route('wells.index')
                         ->with('success', 'Well deleted successfully.');
    }
}