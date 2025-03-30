@extends('layouts.app')

@section('title', 'Add New Well')

@section('content')
    <h1>Add New Well</h1>
    <form action="{{ route('wells.store') }}" method="POST">
        @csrf
        <label>Well Name:</label>
        <input type="text" name="well_name" value="{{ old('well_name') }}">
        @error('well_name') <div>{{ $message }}</div> @enderror

        <label>Field Location:</label>
        <input type="text" name="field_location" value="{{ old('field_location') }}">
        @error('field_location') <div>{{ $message }}</div> @enderror

        <label>Depth (meters):</label>
        <input type="number" name="depth_meters" value="{{ old('depth_meters') }}">
        @error('depth_meters') <div>{{ $message }}</div> @enderror

        <label>Status:</label>
        <select name="status">
            <option value="Drilling">Drilling</option>
            <option value="Producing">Producing</option>
            <option value="Suspended">Suspended</option>
            <option value="Decommissioned">Decommissioned</option>
        </select>
        @error('status') <div>{{ $message }}</div> @enderror

        <label>Production (BPD):</label>
        <input type="text" name="production_bpd" value="{{ old('production_bpd') }}">
        @error('production_bpd') <div>{{ $message }}</div> @enderror

        <label>Commissioned Date:</label>
        <input type="date" name="commissioned_date" value="{{ old('commissioned_date') }}">
        @error('commissioned_date') <div>{{ $message }}</div> @enderror

        <button type="submit">Add Well</button>
    </form>
@endsection