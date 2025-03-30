@extends('layouts.app')

@section('title', 'Well Details')

@section('content')
    <h1>Well Details</h1>
    <ul>
        <li><strong>Well Name:</strong> {{ $well->well_name }}</li>
        <li><strong>Location:</strong> {{ $well->field_location }}</li>
        <li><strong>Depth (meters):</strong> {{ $well->depth_meters }}</li>
        <li><strong>Status:</strong> {{ $well->status }}</li>
        <li><strong>Production (BPD):</strong> {{ $well->production_bpd }}</li>
        <li><strong>Commissioned Date:</strong> {{ $well->commissioned_date }}</li>
    </ul>
    <a href="{{ route('wells.edit', $well->id) }}">Edit</a>
    <form action="{{ route('wells.destroy', $well->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
@endsection   