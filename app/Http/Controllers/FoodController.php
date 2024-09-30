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
            'restaurant_id' => 'required|exists:restaurants,id',
            'name' => 'required|max:255',
            'description' => 'required',
            'price' => 'required|numeric|min:0',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $food = new Food;
        $food->restaurant_id = $request->restaurant_id;
        $food->name = $request->name;
        $food->description = $request->description;
        $food->price = $request->price;
        $food->image = $request->file('image')->store('foods', 'public');
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
            'restaurant_id' => 'required|exists:restaurants,id',
            'name' => 'required|max:255',
            'description' => 'required',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $food = Food::findOrFail($id);
        $food->restaurant_id = $request->restaurant_id;
        $food->name = $request->name;
        $food->description = $request->description;
        $food->price = $request->price;
        
        if ($request->hasFile('image')) {
            $food->image = $request->file('image')->store('foods', 'public');
        }
        
        $food->save();

        return redirect()->route('food.index')->with('success', 'Food item has been updated successfully.');
    }

    public function destroy($id)
    {
        $food = Food::findOrFail($id);
        $food->delete();

        return redirect()->route('food.index')->with('success', 'Food item has been deleted successfully.');
    }
}
