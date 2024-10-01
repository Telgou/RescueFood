@extends('layouts.app-customer')

@section('content')

<!-- Carousel -->
<div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <a href="{{ url('banner-1') }}">
                <img src="{{ asset('images/banner-1.png') }}" class="d-block w-100" alt="Slide 1">
            </a>
        </div>
        {{-- <div class="carousel-item">
            <a href="{{ url('banner-2') }}">
                <img src="{{ asset('images/banner-2.png') }}" class="d-block w-100" alt="Slide 2">
            </a>
        </div> --}}
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
    <h2 class="promo-heading mt-4"></h2>
    <div class="row" style="margin-top: 30px;">
        <div class="col-md-3 py-0 py-md-0">
            <div class="card border-0">
            </div>
        </div>
        <h2 class="promo-heading mt-4"></h2>
        <div class="row" style="margin-top: 30px;">
        </div>
    </div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

@endsection