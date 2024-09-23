<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ArtikelController extends Controller
{
    public function index()
    {
        $artikel = Artikel::all();
        return view('artikel.index', compact('artikel'));
    }

    public function create()
    {
        return view('artikel.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'judul' => 'required|max:255',
            'topic' => 'required|in:Kesehatan,Kecantikan,Lifestyle',
            'sampul' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'jam_buat' => 'required|date_format:H:i',
            'hari_buat' => 'required|date',
            'isi' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $artikel = new Artikel;
        $artikel->judul = $request->judul;
        $artikel->topic = $request->topic;
        $artikel->sampul = $request->file('sampul')->store('sampul', 'public');
        $artikel->jam_buat = $request->jam_buat;
        $artikel->penulis = Auth::user()->name;
        $artikel->hari_buat = $request->hari_buat;
        $artikel->isi = $request->isi;
        $artikel->save();

        return redirect()->route('artikel.index')->with('success', 'Artikel berhasil ditambahkan.');
    }

    public function show($id)
    {
        $artikel = Artikel::find($id);
        return view('landing_page.show_artikel', compact('artikel'));
    }

    public function edit($id)
    {
        $artikel = Artikel::find($id);
        return view('artikel.edit', compact('artikel'));
    }

    public function update(Request $request, $id)
    {
  

        $validator = Validator::make($request->all(), [
            'judul' => 'required|max:255',
            'topic' => 'required|in:Kesehatan,Kecantikan,Lifestyle',
            'sampul' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'isi' => 'required',
        ]);
        $artikel = Artikel::find($id);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $artikel->judul = $request->judul;
        $artikel->topic = $request->topic;
        if ($request->hasFile('sampul')) {
            $artikel->sampul = $request->file('sampul')->store('sampul', 'public');
        }
        $artikel->isi = $request->isi;
        $artikel->save();

        return redirect()->route('artikel.index')->with('success', 'Artikel berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $artikel = Artikel::find($id); 
        $artikel->delete();
        return redirect()->route('artikel.index')->with('success', 'Artikel berhasil dihapus.');
    }

    public function read()
    {
        $artikel = Artikel::all();
        return view('landing_page.artikel', compact('artikel'));
    }    
    public function reading()
    {
        $artikel = Artikel::all();
        return view('customer.artikel', compact('artikel'));
    }

    public function show_customer($id)
    {
        $artikel = Artikel::find($id);
        return view('customer.show_artikel', compact('artikel'));
    }
}