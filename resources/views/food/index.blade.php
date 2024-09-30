@extends('restaurant.dashboard')

@section('content')
<div class="container">
    <h1 class="mb-4">Food List</h1>

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <a href="{{ route('food.create') }}" class="btn btn-success mb-3">Add Food</a>

    @if(isset($food) && $food->count() > 0)
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Description</th>
                <th>Image</th>
                <th>Expiry Date</th>
                <th>Restaurant</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($food as $key => $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->description }}</td>
                <td><img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}" width="100"></td>
                <td>{{ $item->expired_date }}</td>
                <td>{{ $item->restaurant->name }}</td>
                <td>
                    <a href="{{ route('restaurant.food.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('restaurant.food.destroy', $item->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"
                            onclick="return confirm('Are you sure you want to delete this food item?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
        <p>No food items found.</p>
    @endif
</div>
@endsection