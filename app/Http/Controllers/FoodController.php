<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class FoodController extends Controller
{
    public function index()
    {
        $food = Food::with('restaurant')->get();
        return view('food.index', compact('food'));
    }

    public function create()
    {
        return view('food.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'expired_date' => 'required|date|after:today',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = Auth::user();
        if (!$user->restaurant_id) {
            return redirect()->back()->with('error', 'You are not associated with any restaurant.');
        }

        $food = new Food;
        $food->restaurant_id = $user->restaurant_id;
        $food->name = $request->name;
        $food->description = $request->description;
        $food->image = $request->file('image')->store('foods', 'public');
        $food->expired_date = $request->expired_date;
        $food->save();

        return redirect()->route('food.index')->with('success', 'Food item has been added successfully.');
    }

    public function show($id)
    {
        $food = Food::with('restaurant')->findOrFail($id);
        return view('food.show', compact('food'));
    }

    public function edit($id)
    {
        $food = Food::findOrFail($id);
        return view('food.edit', compact('food'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'expired_date' => 'required|date|after:today',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = Auth::user();
        $food = Food::findOrFail($id);

        if ($food->restaurant_id !== $user->restaurant_id) {
            return redirect()->back()->with('error', 'You are not authorized to update this food item.');
        }

        $food->name = $request->name;
        $food->description = $request->description;
        $food->expired_date = $request->expired_date;
        
        if ($request->hasFile('image')) {
            $food->image = $request->file('image')->store('foods', 'public');
        }
        
        $food->save();

        return redirect()->route('food.index')->with('success', 'Food item has been updated successfully.');
    }

    public function destroy($id)
    {
        $user = Auth::user();
        $food = Food::findOrFail($id);

        if ($food->restaurant_id !== $user->restaurant_id) {
            return redirect()->back()->with('error', 'You are not authorized to delete this food item.');
        }

        $food->delete();

        return redirect()->route('food.index')->with('success', 'Food item has been deleted successfully.');
    }
}
