@extends('restaurant.dashboard')

@section('content')
<div class="container">
    <h1 class="mb-4">Edit Food</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('food.update', $food->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group"><br>
            <label for="judul">Judul Food:</label><br>
            <input type="text" class="form-control" id="judul" name="judul" value="{{ $food->judul }}" required>
        </div><br>
        <div class="form-group">
            <label for="topic">Topik Food:</label><br>
            <select class="form-control" id="topic" name="topic" required>
                <option value="Kesehatan" {{ $food->topic === 'Kesehatan' ? 'selected' : '' }}>
                    Kesehatan</option>
                <option value="Kecantikan" {{ $food->topic === 'Kecantikan' ? 'selected' : '' }}>
                    Kecantikan</option>
                <option value="Lifestyle" {{ $food->topic === 'Lifestyle' ? 'selected' : '' }}>
                    Lifestyle</option>
            </select>
        </div><br>

        <div class="form-group">
            <label for="image">image Food:</label><br>
            <input type="file" class="form-control-file" id="image" name="image" accept="image/*">
        </div><br>
        <div class="form-group">
            <label for="isi">Isi Food:</label><br>
            <textarea class="form-control" id="isi" name="isi" required>{{ $food->isi }}</textarea>
        </div><br>
        <div class="form-group">
            <label for="penulis">Penulis:</label><br>
            <input type="text" class="form-control" id="penulis" name="penulis" value="{{ $food->penulis }}"
                readonly>
        </div><br>
        <div class="d-flex justify-content-between mt-3">
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="{{ url()->previous() }}" class="btn btn-secondary">Kembali</a>
        </div>
    </form>
</div>
@endsection