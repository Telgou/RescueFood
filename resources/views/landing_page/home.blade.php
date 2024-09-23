@extends('layouts.app-home')

@section('content')
<!-- Carousel -->
<div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <a href="{{ url('banner-1') }}">
                <img src="{{ asset('images/banner-1.png') }}" class="d-block w-100" alt="Slide 1">
            </a>
        </div>
        <div class="carousel-item">
            <a href="{{ url('banner-2') }}">
                <img src="{{ asset('images/banner-2.png') }}" class="d-block w-100" alt="Slide 2">
            </a>
        </div>
        <div class="carousel-item">
            <a href="{{ url('banner-3') }}">
                <img src="{{ asset('images/banner-3.png') }}" class="d-block w-100" alt="Slide 3">
            </a>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<!-- Menu -->
<div class="container" id="coffee">
    <h2 class="promo-heading mt-4">Todays Promo</h2>
    <div class="row" style="margin-top: 30px;">
        <div class="col-md-3 py-0 py-md-0">
            <div class="card border-0">
                <img src="{{ asset('images/menu/vanila-latte.png') }}" alt="">
                <div class="card-body">
                    <h3 class="menu-coffee">Vanilla Latte</h3>
                    <h5 class="menu-coffee">Rp 10.000 <span class="line-stike">Rp 13.000 </span></h5>

                </div>
            </div>
        </div>
        <h2 class="promo-heading mt-4">Featured Products</h2>
        <div class="row" style="margin-top: 30px;">
            <div class="col-md-3 py-0 py-md-0">
                <div class="card border-0">
                    <img src="{{ asset('images/menu/saltedcaramellatte.png') }}" alt="">
                    <div class="card-body">
                        <h3 class="menu-coffee">Salted Caramel Latte</h3>
                        <h5 class="menu-coffee">Rp 19.000 <span></span></h5>
                        <!-- <h6 class="menu-coffee">Stock : 16</h6> -->
                    </div>
                </div>
            </div>
            <div class="col-md-3 py-0 py-md-0">
                <div class="card border-0">
                    <img src="{{ asset('images/menu/aren-latte.png') }}" alt="">
                    <div class="card-body">
                        <h3 class="menu-coffee">Aren Latte</h3>
                        <h5 class="menu-coffee">Rp 9.000 <span></span></h5>
                        <!-- <h6 class="menu-coffee">Stock : 12</h6> -->
                    </div>
                </div>
            </div>
            <div class="col-md-3 py-0 py-md-0">
                <div class="card border-0">
                    <img src="{{ asset('images/menu/caramellatte.png') }}" alt="">
                    <div class="card-body">
                        <h3 class="menu-coffee">Caramell Latte</h3>
                        <h5 class="menu-coffee">Rp 13.000 <span></span></h5>
                        <!-- <h6 class="menu-coffee">Stock : 6</h6> -->
                    </div>
                </div>
            </div>
            <div class="col-md-3 py-0 py-md-0">
                <div class="card border-0">
                    <img src="{{ asset('images/menu/creamycoffee.png') }}" alt="">
                    <div class="card-body">
                        <h3 class="menu-coffee">Creamy Coffee</h3>
                        <h5 class="menu-coffee">Rp 15.000 <span></span></h5>
                        <!-- <h6 class="menu-coffee">Stock : 11</h6> -->
                    </div>
                </div>
            </div>
            <div class="col-md-3 py-0 py-md-0">
                <div class="card border-0">
                    <img src="{{ asset('images/menu/oceanblue.png') }}" alt="">
                    <div class="card-body">
                        <h3 class="menu-coffee">Ocean Blue</h3>
                        <h5 class="menu-coffee">Rp 15.000 <span></span></h5>
                        <!-- <h6 class="menu-coffee">Stock : 11</h6> -->
                    </div>
                </div>
            </div>
            <div class="col-md-3 py-0 py-md-0">
                <div class="card border-0">
                    <img src="{{ asset('images/menu/icecreamsandwich.png') }}" alt="">
                    <div class="card-body">
                        <h3 class="menu-coffee">Ice Cream Sandwich</h3>
                        <h5 class="menu-coffee">Rp 15.000 <span></span></h5>
                        <!-- <h6 class="menu-coffee">Stock : 2</h6> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

@endsection