<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    // Method to display the home page with products
    public function home()
    {
        // Mock product data
        $products = [
            ['id' => 1, 'name' => 'Product A', 'price' => 100],
            ['id' => 2, 'name' => 'Product B', 'price' => 150],
            ['id' => 3, 'name' => 'Product C', 'price' => 200],
        ];

        // Return the home view with the products data
        return view('home', ['products' => $products]);
    }

    // Method to display the about page
    public function about()
{
    // Mock team data
    $team = [
        ['name' => 'John Doe', 'position' => 'CEO'],
        ['name' => 'Jane Smith', 'position' => 'Developer'],
        ['name' => 'Mark Johnson', 'position' => 'Designer'],
    ];

    // Return the about view with the team data
    return view('about', ['team' => $team]);
}
}
