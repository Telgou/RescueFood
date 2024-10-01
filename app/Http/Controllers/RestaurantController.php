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
        return view('restaurant.edit', compact('restaurant'));
    }

    public function update(Request $request, Restaurant $restaurant)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'nullable|string|max:255',
            'contact' => 'nullable|string|max:255',
            'cuisine_type' => 'nullable|string|max:255',
            'opening_time' => 'nuzllable|date_format:H:i',
            'closing_time' => 'nullable|date_format:H:i',
            'user_id' => $restaurant,
        ]);

        \Log::info('Validated data:', $validated);

        foreach ($validated as $key => $value) {
            $restaurant->$key = $value;
        }

        $saved = $restaurant->save();

        \Log::info('Save result:', ['saved' => $saved]);
        \Log::info('Updated restaurant:', $restaurant->toArray());

        if ($saved) {
            return redirect()->route('restaurant.edit', $restaurant)
                ->with('success', 'Restaurant updated successfully');
        } else {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Failed to update restaurant. Please try again.');
        }
    }
}
