@extends('layouts.app-customer')


@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Feedbacks</h1>

    @if ($feedbacks->isEmpty())
        <div class="alert alert-info text-center">
            No feedback available for this association.
        </div>
    @else
        <div class="table-responsive">
            <table class="table table-striped table-hover" style="background-color: #f9f9f9; border-radius: 10px; overflow: hidden; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
                <thead class="thead-light" style="background-color: #28a745; color: white;">
                    <tr>
                        <th>ID</th>
                        <th>Note</th>
                        <th>Comments</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($feedbacks as $feedback)
                    <tr style="transition: background-color 0.3s;">
                        <td>{{ $feedback->id }}</td>
                        <td>{{ $feedback->note }}</td>
                        <td>{{ $feedback->comments }}</td>
                        <td>
                            <!-- Delete Button -->
                            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $feedback->id }}">
                                Delete
                            </button>

                            <!-- Delete Confirmation Modal -->
                            <div class="modal fade" id="deleteModal{{ $feedback->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $feedback->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteModalLabel{{ $feedback->id }}">Confirm Deletion</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure you want to delete this feedback?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                            <form action="{{ route('feedbacks.destroy', $feedback->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection


