@extends('layouts.app-admin')

@section('content')
<div class="container">
    <div class="container mt-4 card card-body">
        <h4>Tambah Artikel</h4>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('artikel.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="judul">Judul:</label>
                <input type="text" class="form-control" id="judul" name="judul" required>
            </div><br>
            <div class="form-group">
                <label for="topic">Topik:</label>
                <select class="form-control" id="topic" name="topic" required>
                    <option value="Kesehatan">Kesehatan</option>
                    <option value="Kecantikan">Kecantikan</option>
                    <option value="Lifestyle">Lifestyle</option>
                </select>
            </div><br>
            <div class="form-group">
                <label for="sampul">Sampul:</label><br>
                <input type="file" class="form-control-file" id="sampul" name="sampul" accept="image/*" required>
            </div><br>
            <div class="form-group">
                <label for="jam_buat">Jam Buat:</label>
                <input type="time" class="form-control" id="jam_buat" name="jam_buat" required>
            </div><br>
            <div class="form-group">
                <label for="hari_buat">Hari Buat:</label>
                <input type="date" class="form-control" id="hari_buat" name="hari_buat" required>
            </div><br>
            <div class="form-group">
                <label for="isi">Isi:</label><br>
                <textarea class="form-control" id="isi" name="isi" rows="6" required></textarea>
            </div><br>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>

<script>
var jamInput = document.getElementById('jam_buat');
var hariInput = document.getElementById('hari_buat');


var waktuSekarang = new Date();


jamInput.value = waktuSekarang.getHours() + ':' + waktuSekarang.getMinutes();


var tahun = waktuSekarang.getFullYear();
var bulan = waktuSekarang.getMonth() + 1;
var tanggal = waktuSekarang.getDate();


bulan = (bulan < 10) ? '0' + bulan : bulan;
tanggal = (tanggal < 10) ? '0' + tanggal : tanggal;


hariInput.value = tahun + '-' + bulan + '-' + tanggal;
</script>
@endsection