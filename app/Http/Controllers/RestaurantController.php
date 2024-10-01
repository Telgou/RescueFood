<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    // ... other methods ...

    public function edit(Restaurant $restaurant)
    {
        $restaurant = auth()->user()->restaurant;
        if (!$restaurant) {
            return redirect()->route('restaurant.dashboard')->with('error', '.');
        }
        return view('restaurant.edit', compact('restaurant'));
    }

    public function update(Request $request)
    {
        $restaurant = auth()->user()->restaurant;
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'contact' => 'required|string',
            'cuisine_type' => 'required|string',
            'opening_hours' => 'required|string',
        ]);

        $restaurant->update($validated);

        return redirect()->route('restaurant.edit')->with('success', 'Restaurant updated successfully');
    }
}
