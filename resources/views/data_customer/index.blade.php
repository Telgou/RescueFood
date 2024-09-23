@extends('layouts.app-admin')

@section('content')
<main class="content px-3 py-2">
    <div class="container mt-5 card card-body">
        <div class="container mt-4">
            <h2>Data Akun Customer</h2>
            <table class="table table-bordered ">
                <thead>
                    <tr>
                        <th>Nama Customer</th>
                        <th>No Customer</th>
                        <th>Tempat Lahir</th>
                        <th>Tanggal Lahir</th>
                        <th>Email Customer</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @for($index = 0; $index < count($data_customer); $index++) @php $user=$data_customer[$index];
                        @endphp @if($user->role === 'customer')
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->no_hp }}</td>
                            <td>{{ $user->tempat_lahir }}</td>
                            <td>{{ $user->tanggal_lahir }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <form action="{{ route('data_customer.destroy', $user->id) }}" method="POST"
                                    style="display:inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus ?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endif
                        @endfor
                </tbody>
            </table>
        </div>
    </div>
</main>
@endsection