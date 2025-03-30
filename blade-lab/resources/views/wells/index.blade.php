@extends('layouts.app')

@section('title', 'Well List')

@section('content')
    <h1>Well List</h1>

    <!-- Search and Filter Form -->
    <form method="GET" action="{{ route('wells.index') }}">
        <input type="text" name="search" placeholder="Search by name or status" value="{{ request('search') }}">
        <input type="text" name="field_location" placeholder="Filter by location" value="{{ request('field_location') }}">
        <input type="date" name="start_date" value="{{ request('start_date') }}">
        <input type="date" name="end_date" value="{{ request('end_date') }}">
        <button type="submit">Search</button>
    </form>

    @if (session('success'))
        <div>{{ session('success') }}</div>
    @endif

    <!-- Well List Table -->
    <table>
        <thead>
            <tr>
                <th>Well Name</th>
                <th>Field Location</th>
                <th>Status</th>
                <th>Commissioned Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($wells as $well)
                <tr>
                    <td>{{ $well->well_name }}</td>
                    <td>{{ $well->field_location }}</td>
                    <td>{{ $well->status }}</td>
                    <td>{{ $well->commissioned_date }}</td>
                    <td>
                        <a href="{{ route('wells.show', $well->id) }}">View</a>
                        <a href="{{ route('wells.edit', $well->id) }}">Edit</a>
                        <form action="{{ route('wells.destroy', $well->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">No wells found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection