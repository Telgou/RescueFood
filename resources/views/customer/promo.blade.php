@extends('layouts.app-customer')

@section('content')
<section class="header-main border-bottom bg-white">
    <div class="container-fluid">
        <div class="row p-2 pt-3 pb-3 d-flex align-items-center">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">
                <div class="d-flex form-inputs">
                    <input class="form-control" type="text" placeholder="Search any product...">
                    <i class="bx bx-search"></i>
                </div>
            </div>

            <div class="col-md-2">
                <div class="d-flex d-none d-md-flex flex-row align-items-center">
                    <span class="shop-bag"><i class='bx bxs-shopping-bag'></i></span>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="container" id="coffee">
    <h2 class="promo-heading mt-4">Promo</h2>
    <div class="row" style="margin-top: 30px;">
        @foreach($promos as $promo)
        <div class="col-md-3 py-0 py-md-0">
            <div class="card border-0">
                <img src="{{ asset($promo->gambar_promo) }}" alt="{{ $promo->nama_promo }}">
                <div class="card-body">
                    <h3 class="menu-coffee">{{ $promo->nama_promo }}</h3>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection