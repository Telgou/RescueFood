@extends('restaurant.dashboard')

@section('content')

<div class="container-fluid">
    <div class="mb-3">
        <h4>List Feedback</h4>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>id------</th>
                <th>note</th>
                <th>comment</th>
                <th>from</th>
                <th>date</th>
            
            </tr>
        </thead>
        <tbody>
            @foreach($feedbacks as $feedback)
            <tr>
                <td>{{ $feedback->id }}</td>
                <td>{{ $feedback->note }}</td>
                <td>{{ $feedback->comments }}</td>
                <td>{{ $feedback->nom }}</td>
                <td>{{ $feedback->created_at }}</td>
       
            </tr>
            @endforeach
        </tbody>
    </table>

</div>



@endsection
