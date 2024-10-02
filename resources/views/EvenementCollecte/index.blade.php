@extends('layouts.app-admin')

@section('content')
<main class="content px-3 py-2">
    <div class="container mt-5 card card-body">
        <div class="container mt-4">
            <h1>Liste des événements de collecte</h1>

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <a href="{{ route('evenement-collecte.create') }}" class="btn btn-primary mb-3">Créer un nouvel événement</a>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Date</th>
                        <th>Lieu</th>
                        <th>Type de nourriture</th>
                        <th>Organisateur</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($evenements as $evenement)
                    <tr>
                        <td>{{ $evenement->nom }}</td>
                        <td>{{ \Carbon\Carbon::parse($evenement->date)->format('d/m/Y') }}</td>
                        <td>{{ $evenement->lieu }}</td>
                        <td>{{ $evenement->type_nourriture }}</td>
                        <td>{{ $evenement->organisateur }}</td>
                        <td>
                            <a href="{{ route('evenement-collecte.edit', $evenement->id) }}" class="btn btn-warning">Modifier</a>
                            <form action="{{ route('evenement-collecte.destroy', $evenement->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet événement ?')">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</main>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
