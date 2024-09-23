@extends('layouts.app-customer')

@section('content')
<main class="content px-3 py-2">
    <div class="container-fluid">
        <div class="container mt-5 card card-body">
            <h1>Notification</h1>

            @if(count($orders) > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Menu</th>
                        <th>Gambar Menu</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                        <th>Status</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->menu->nama_menu }}</td>
                        <td>
                            <img src="{{ asset($order->menu->gambar_menu) }}" alt="Menu Image" width="50" height="50">
                        </td>
                        <td>{{ $order->quantity }}</td>
                        <td>{{ number_format($order->total_price, 2, '.', ',') }}</td>
                        <td>{{ $order->status }}</td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <p>No order history available.</p>
            @endif
        </div>
    </div>
</main>
@endsection