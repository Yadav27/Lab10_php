@extends('layouts.app')

@section('title', 'Home Page')

@section('content')
    <h1>Welcome to My Laravel App</h1>

    {{-- Displaying products using @forelse --}}
    <h2>Our Products</h2>
    <ul>
        @forelse($products as $product)
            <li>{{ $product['name'] }} - ${{ $product['price'] }}</li>
        @empty
            <p class="alert alert-warning">No products available at the moment.</p>
        @endforelse
    </ul>

    {{-- Blade Component for an Alert --}}
    <x-alert type="success" title="Success!" message="This is a sample success alert!" />

    {{-- Blade Component for a Button --}}
    <x-button type="primary" label="Learn More" url="/about" />
@endsection
