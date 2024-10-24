@extends('restaurant.dashboard')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4 text-center text-primary">Food List</h1>

    @if(session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    @endif

    <div class="text-right mb-4">
        <a href="{{ route('food.create') }}" class="btn btn-success btn-lg">Add Food</a>
    </div>

    @if(isset($food) && $food->count() > 0)
        <div class="row">
            @foreach($food as $key => $item)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ asset('storage/' . $item->image) }}" class="card-img-top" alt="{{ $item->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->name }}</h5>
                            <p class="card-text">{{ $item->description }}</p>
                            <p class="text-muted">Expiry Date: {{ $item->expired_date }}</p>
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('food.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('food.destroy', $item->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('Are you sure you want to delete this food item?')">Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p class="text-center">No food items found.</p>
    @endif
</div>
@endsection
