@extends('layouts.appbar')
@section('content')
<div class="content-wrapper p-4">
    <h3 class="mb-4 text-dark">My Orders</h3>
    @if(count($orders) > 0)
        <div class="list-group">
            @foreach($orders as $order)
                <div class="list-group-item list-group-item-action d-flex justify-content-between align-items-center shadow-sm mb-3">
                    <div>
                        <h5 class="mb-1">Order ID: #{{ $order->id }}</h5>
                        <p class="mb-1 text-muted">
                            <strong>Date:</strong> {{ $order->created_at->format('d M Y') }}
                        </p>
                        <p class="mb-1">
                            <strong>Status:</strong>
                            <span class="badge 
                                {{ $order->status == 'pending' ? 'bg-warning' : 'bg-success' }}">
                                {{ ucfirst($order->status) }}
                            </span>
                        </p>
                        <p class="mb-0">
                            <strong>Total:</strong> KSh {{ number_format($order->total_amount, 2) }}
                        </p>
                    </div>
                    <div>
                        @if($order->status == 'pending')

                         <a href="{{ route('orders.show', $order->id) }}" class="btn btn-outline-secondary btn-sm">View Details</a>
                         
                            <a href="{{ route('pay_now', $order->id) }}" class="btn btn-outline-primary btn-sm">Pay Now</a>
                        @else
                            <a href="{{ route('orders.show', $order->id) }}" class="btn btn-outline-secondary btn-sm">View Details</a>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="alert alert-warning text-center" role="alert">
            <p class="mb-3">You have no orders at the moment.</p>
            <a href="{{ route('shop') }}" class="btn btn-primary">Start Shopping</a>
        </div>
    @endif
</div>
@endsection
