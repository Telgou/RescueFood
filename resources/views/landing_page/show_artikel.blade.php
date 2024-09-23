@extends('layouts.app-home')

@section('content')
<div class="mt-5">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <img class="card-img-top" src="{{ asset('storage/' . $artikel->sampul) }}"
                        alt="{{ $artikel->judul }}">
                    <div class="card-body">
                        <h1 class="card-title">{{ $artikel->judul }}</h1>
                        <p class="card-text">{{ $artikel->isi }}</p>
                        <p class="text-muted">Ditulis oleh {{ $artikel->penulis }} pada {{ $artikel->hari_buat }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection