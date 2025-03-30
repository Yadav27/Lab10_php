@extends('layouts.app')

@section('title', 'Edit Well')

@section('content')
    <h1>Edit Well</h1>
    <form action="{{ route('wells.update', $well->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Well Name:</label>
        <input type="text" name="well_name" value="{{ old('well_name', $well->well_name) }}">
        @error('well_name') <div>{{ $message }}</div> @enderror

        <label>Field Location:</label>
        <input type="text" name="field_location" value="{{ old('field_location', $well->field_location) }}">
        @error('field_location') <div>{{ $message }}</div> @enderror

        <label>Depth (meters):</label>
        <input type="number" name="depth_meters" value="{{ old('depth_meters', $well->depth_meters) }}">
        @error('depth_meters') <div>{{ $message }}</div> @enderror

        <label>Status:</label>
        <select name="status">
            <option value="Drilling" {{ $well->status == 'Drilling' ? 'selected' : '' }}>Drilling</option>
            <option value="Producing" {{ $well->status == 'Producing' ? 'selected' : '' }}>Producing</option>
            <option value="Suspended" {{ $well->status == 'Suspended' ? 'selected' : '' }}>Suspended</option>
            <option value="Decommissioned" {{ $well->status == 'Decommissioned' ? 'selected' : '' }}>Decommissioned</option>
        </select>
        @error('status') <div>{{ $message }}</div> @enderror

        <label>Production (BPD):</label>
        <input type="text" name="production_bpd" value="{{ old('production_bpd', $well->production_bpd) }}">
        @error('production_bpd') <div>{{ $message }}</div> @enderror

        <label>Commissioned Date:</label>
        <input type="date" name="commissioned_date" value="{{ old('commissioned_date', $well->commissioned_date) }}">
        @error('commissioned_date') <div>{{ $message }}</div> @enderror

        <button type="submit">Update Well</button>
    </form>
@endsection