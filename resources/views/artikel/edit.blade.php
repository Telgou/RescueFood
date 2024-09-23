@extends('layouts.app-admin')

@section('content')
<div class="container">
    <h1 class="mb-4">Edit Artikel</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('artikel.update', $artikel->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group"><br>
            <label for="judul">Judul Artikel:</label><br>
            <input type="text" class="form-control" id="judul" name="judul" value="{{ $artikel->judul }}" required>
        </div><br>
        <div class="form-group">
            <label for="topic">Topik Artikel:</label><br>
            <select class="form-control" id="topic" name="topic" required>
                <option value="Kesehatan" {{ $artikel->topic === 'Kesehatan' ? 'selected' : '' }}>
                    Kesehatan</option>
                <option value="Kecantikan" {{ $artikel->topic === 'Kecantikan' ? 'selected' : '' }}>
                    Kecantikan</option>
                <option value="Lifestyle" {{ $artikel->topic === 'Lifestyle' ? 'selected' : '' }}>
                    Lifestyle</option>
            </select>
        </div><br>

        <div class="form-group">
            <label for="sampul">Sampul Artikel:</label><br>
            <input type="file" class="form-control-file" id="sampul" name="sampul" accept="image/*">
        </div><br>
        <div class="form-group">
            <label for="isi">Isi Artikel:</label><br>
            <textarea class="form-control" id="isi" name="isi" required>{{ $artikel->isi }}</textarea>
        </div><br>
        <div class="form-group">
            <label for="penulis">Penulis:</label><br>
            <input type="text" class="form-control" id="penulis" name="penulis" value="{{ $artikel->penulis }}"
                readonly>
        </div><br>
        <div class="d-flex justify-content-between mt-3">
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="{{ url()->previous() }}" class="btn btn-secondary">Kembali</a>
        </div>
    </form>
</div>
@endsection