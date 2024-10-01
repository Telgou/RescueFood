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
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $food->name) }}" required>
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control" id="description" name="description" required>{{ old('description', $food->description) }}</textarea>
        </div>
        <div class="form-group">
            <label for="image">Image:</label>
            <input type="file" class="form-control-file" id="image" name="image" accept="image/*">
            @if($food->image)
                <img src="{{ asset('storage/' . $food->image) }}" alt="{{ $food->name }}" width="100" class="mt-2">
            @endif
        </div>
        <div class="form-group">
            <label for="expired_date">Expiry Date:</label>
            <input type="date" class="form-control" id="expired_date" name="expired_date" value="{{ old('expired_date', $food->expired_date) }}" required>
        </div>
        <div class="form-group">
            <label for="restaurant_id">Restaurant:</label>
            <input type="text" class="form-control" id="restaurant_id" name="restaurant_id" value="{{ $food->restaurant->name ?? '' }}" readonly>
        </div>
        <div class="d-flex justify-content-between mt-3">
            <button type="submit" class="btn btn-primary">Save Changes</button>
            <a href="{{ route('food.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </form>
</div>
@endsection