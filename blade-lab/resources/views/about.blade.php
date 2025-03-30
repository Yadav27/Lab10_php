@extends('layouts.app')

@section('title', 'About Us')

@section('content')
    <h1>About Our Company</h1>
    <p>We are a leading provider of quality services and products.</p>

    {{-- Displaying team members using @forelse --}}
    <h2>Our Team</h2>
    @forelse($team as $member)
        <p>{{ $member['name'] }} - {{ $member['position'] }}</p>
    @empty
        <p class="alert alert-info">No team members available.</p>
    @endforelse

    {{-- Using the Button Component --}}
    <x-button type="secondary" label="Go to Home" url="/" />
@endsection
