@extends('restaurant.dashboard')

@section('content')
<div class="container-fluid">
    <div class="mb-3">
        <h4>Edit Restaurant</h4>
    </div>
    <div class="row">
        <div class="col-12">
            <form action="{{ route('restaurant.update', $restaurant) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="mb-3">
                    <label for="name" class="form-label">Restaurant Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $restaurant->name) }}" required>
                </div>

                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <textarea class="form-control" id="address" name="address" rows="3" required>{{ old('address', $restaurant->address) }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="contact" class="form-label">Contact</label>
                    <input type="text" class="form-control" id="contact" name="contact" value="{{ old('contact', $restaurant->contact) }}" required>
                </div>

                <div class="mb-3">
                    <label for="cuisine_type" class="form-label">Cuisine Type</label>
                    <input type="text" class="form-control" id="cuisine_type" name="cuisine_type" value="{{ old('cuisine_type', $restaurant->cuisine_type) }}" required>
                </div>

                <div class="mb-3">
                    <label for="opening_hours" class="form-label">Opening Hours</label>
                    <input type="text" class="form-control" id="opening_hours" name="opening_hours" value="{{ old('opening_hours', $restaurant->opening_hours) }}" required>
                </div>

                <button type="submit" class="btn btn-primary">Update Restaurant</button>
            </form>
        </div>
    </div>
</div>
@endsection
