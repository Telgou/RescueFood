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
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $food->name) }}" required readonly>
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
            <label for="calories">Calories Per 100g:</label>
            <input type="text" name="calories" id="calories" class="form-control" value="{{ old('calories', $food->calories) }}" required step="0.01">
            <div id="nutrient-results" class="mt-3 d-flex justify-content-between">
                <div id="protein" class="mr-3"></div>
                <div id="fat" class="mr-3"></div>
                <div id="carbs"></div>
            </div>
        </div>
        <input type="hidden" name="fats" id="fats" value="{{ old('fats', $food->fats) }}">
        <input type="hidden" name="carbs" id="carbs" value="{{ old('carbs', $food->carbs) }}">
        <input type="hidden" name="proteins" id="proteins" value="{{ old('proteins', $food->proteins) }}">
        <div class="form-group mb-3">
            <label for="input_protein">Protein (g)</label>
            <input type="text" name="input_protein" id="input_protein" class="form-control" value="{{ old('input_protein', $food->proteins) }}" oninput="recalculateCalories()">
        </div>
        <div class="form-group mb-3">
            <label for="input_fat">Fat (g)</label>
            <input type="text" name="input_fat" id="input_fat" class="form-control" value="{{ old('input_fat', $food->fats) }}" oninput="recalculateCalories()">
        </div>
        <div class="form-group mb-3">
            <label for="input_carbs">Carbohydrates (g)</label>
            <input type="text" name="input_carbs" id="input_carbs" class="form-control" value="{{ old('input_carbs', $food->carbs) }}" oninput="recalculateCalories()">
        </div>

        <div class="form-group" hidden>
            <label for="expired_date">Expiry Date:</label>
            <input type="date" class="form-control" id="expired_date" name="expired_date" value="{{ old('expired_date', $food->expired_date) }}" required>
        </div>

        <button type="submit" class="btn btn-primary btn-block">Save Changes</button>
    </form>
</div>

<script>
    // Import the recalculateCalories function from create.blade.php
    function recalculateCalories() {
        const fats = parseFloat(document.getElementById('input_fat').value) || 0;
        const carbs = parseFloat(document.getElementById('input_carbs').value) || 0;
        const proteins = parseFloat(document.getElementById('input_protein').value) || 0;

        const calories = (fats * 9) + (carbs * 4) + (proteins * 4);
        document.getElementById('calories').value = calories.toFixed(2);
    }

</script>

@endsection
