@extends('layouts.app-admin')

@section('content')
<div class="container">
    <h1 class="mb-4">Daftar Artikel</h1>

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <a href="{{ route('artikel.create') }}" class="btn btn-success mb-3">Tambah Artikel</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Topik</th>
                <th>Sampul</th>
                <th>Jam Buat</th>
                <th>Penulis</th>
                <th>Hari Buat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($artikel as $key => $art)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $art->judul }}</td>
                <td>{{ $art->topic }}</td>
                <td><img src="{{ asset('storage/' . $art->sampul) }}" alt="{{ $art->judul }}" width="100"></td>
                <td>{{ $art->jam_buat }}</td>
                <td>{{ $art->penulis }}</td>
                <td>{{ $art->hari_buat }}</td>
                <td>
                    <a href="{{ route('artikel.edit', $art->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('artikel.destroy', $art->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"
                            onclick="return confirm('Apakah Anda yakin ingin menghapus artikel ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection