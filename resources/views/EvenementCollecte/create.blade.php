@extends('layouts.app-admin')

@section('content')
<main class="content px-3 py-2">
    <div class="container mt-5 card card-body">
        <h1>Créer un nouvel événement de collecte</h1>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('evenement-collecte.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom" required>
            </div>
            <div class="form-group">
                <label for="date">Date</label>
                <input type="date" class="form-control" id="date" name="date" required>
            </div>
            <div class="form-group">
                <label for="lieu">Lieu</label>
                <input type="text" class="form-control" id="lieu" name="lieu" required>
            </div>
            <div class="form-group">
                <label for="type_nourriture">Type de nourriture</label>
                <input type="text" class="form-control" id="type_nourriture" name="type_nourriture" required>
            </div>
            <div class="form-group">
                <label for="organisateur">Organisateur</label>
                <input type="text" class="form-control" id="organisateur" name="organisateur" required>
            </div>
            <button type="submit" class="btn btn-primary">Créer</button>
            <a href="{{ route('evenement-collecte.index') }}" class="btn btn-secondary">Annuler</a>
        </form>
    </div>
</main>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
