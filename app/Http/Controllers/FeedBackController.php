<?php

namespace App\Http\Controllers;

use App\Models\FeedBack;
use Illuminate\Http\Request;

class FeedBackController extends Controller
{
    
    public function index()
    {
        $feedbacks = FeedBack::all();
        return view('feedbacks.index', compact('feedbacks'));
    }

    
    public function create()
    {
        return view('feedbacks.create');
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'note' => 'required|integer|min:1|max:5',
            'comments' => 'required|string',
        ]);

        FeedBack::create($request->all());

        return redirect()->route('feedbacks.index')->with('success', 'Feedback created successfully.');
    }

    
    public function show(FeedBack $feedback)
    {
        return view('feedbacks.show', compact('feedback'));
    }

    
    public function edit(FeedBack $feedback)
    {
        return view('feedbacks.edit', compact('feedback'));
    }

    
    public function update(Request $request, FeedBack $feedback)
    {
        $request->validate([
            'note' => 'required|integer|min:1|max:5',
            'comments' => 'required|string',
        ]);

        $feedback->update($request->all());

        return redirect()->route('feedbacks.index')->with('success', 'Feedback updated successfully.');
    }

    
    public function destroy(FeedBack $feedback)
    {
        $feedback->delete();

        return redirect()->route('feedbacks.index')->with('success', 'Feedback deleted successfully.');
    }
}
