<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;
use App\Models\User;

class RestaurantController extends Controller
{

    public function edit(Restaurant $restaurant)
    {
        $restaurant = auth()->user()->restaurant;
        return view('restaurant.edit', compact('restaurant'));
    }

    public function update(Request $request, Restaurant $restaurant)
    {
        \Log::info('Restaurant:', $restaurant->toArray());
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'nullable|string|max:255',
            'contact' => 'nullable|string|max:255',
            'cuisine_type' => 'nullable|string|max:255',
            'opening_time' => 'nullable|date_format:H:i',
            'closing_time' => 'nullable|date_format:H:i',
            'user_id' => $restaurant->user_id,
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

    public function index()
    {
        $restaurants = Restaurant::where('status', 'PENDING')->get();
        \Log::info('Restaurants:', $restaurants->toArray());
        return view('admin.list_restaurant.verify', compact('restaurants'));
    }

public function show($id)
    {
        $restaurant = Restaurant::where('status', 'PENDING')->findOrFail($id);
        return view('admin.list_restaurant.show', compact('restaurant'));
    }
public function accept($id)
    {
        $restaurant = Restaurant::findOrFail($id);


        $restaurant->status = 'ACCEPT';
        $restaurant->save();


        $user = User::where('name', $restaurant->owner_name)->first();
        if ($user) {
            $user->role = 'restaurant';  
            $user->save();
        }

        return redirect()->route('admin.dashboard')->with('success', 'Restaurant successfully accepted and user role updated.');
    }
public function create()
    {
        $user = auth()->user();
        $restaurant = Restaurant::where('user_id', $user->id)->first();
        return view('menus.create', compact('restaurant'));
    }

public function listRestaurantNames()
    {
        $restaurants = Restaurant::all(['restaurant_name']);
        return view('menus.create', compact('restaurants'));
    }
public function dataRestaurantNames()
    {
        $restaurants = Restaurant::where('status', 'ACCEPT')->get();
        return view('admin.daftar_restaurant.index', compact('restaurants'));
    }

public function destroy($id)
{
    $restaurant = Restaurant::findOrFail($id);
    
    $user = User::where('id', $restaurant->user_id)->first();
    if ($user) {
        $user->delete();
    }
    
    $restaurant->delete();
    
    return redirect()->route('admin.dashboard')->with('success', 'Restaurant and associated user account have been deleted.');
}
}
