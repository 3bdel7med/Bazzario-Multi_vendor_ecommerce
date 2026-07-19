@extends('layouts.app')
@section('content')
<div class="container py-5" dir="ltr">
    <h1 class="display-6 font-weight-extrabold text-dark mb-4">My Purchase History      <a href="{{ route('invoice') }}">Print</a></h1>

    @if(session('success'))
        <div class="alert alert-success mb-4 rounded-3 small" role="alert">
            {{ session('success') }}
        </div>
    @endif

    @forelse($orders as $order)
        <div class="card border border-light shadow-sm rounded-3 mb-5 overflow-hidden">

            <div class="card-header bg-dark text-white px-4 py-3">
                <div class="row align-items-center g-3">
                    <div class="col-6 col-md-3">
                        <span class="text-muted small d-block text-uppercase">Order Placed</span>
                        <span class="font-weight-medium small">{{ $order->created_at->format('M d, Y H:i') }}</span>
                    </div>
                    <div class="col-6 col-md-3">
                        <span class="text-muted small d-block text-uppercase">Total Amount</span>
                        <span class="font-weight-bold text-success">${{ number_format($order->total_price, 2) }}</span>
                    </div>
                    <div class="col-12 col-md-3">
                        <span class="text-muted small d-block text-uppercase">Payment Status</span>
                        <span class="badge bg-success rounded-pill px-2.5 py-1 small">
                            {{ $order->payment_status }} ({{ $order->payment_method ?? 'Card' }})
                        </span>
                    </div>
                    <div class="col-12 col-md-3 text-md-end">
                        <span class="text-muted small d-block text-uppercase">Order ID</span>
                        <span class="font-mono font-weight-bold text-warning">{{ $order->order_number }}</span>
                    </div>
                </div>
            </div>

            <div class="card-body p-0">
                @foreach($order->vendorOrders as $subOrder)
                    <div class="border-bottom border-light p-4 bg-light-gradient">

                        <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-3">
                            <h3 class="h6 font-weight-bold text-primary mb-0">
                                🏪 Shipment from: <span class="text-dark">{{ $subOrder->shop->name ?? 'Unknown Shop' }}</span>
                            </h3>

                            @if($subOrder->status === 'pending')
                                <span class="badge bg-secondary rounded-2 px-3 py-1.5 text-uppercase">Awaiting Processing</span>
                            @elseif($subOrder->status === 'processing')
                                <span class="badge bg-info text-dark rounded-2 px-3 py-1.5 text-uppercase">Packing Item</span>
                            @elseif($subOrder->status === 'shipped')
                                <span class="badge bg-warning text-dark rounded-2 px-3 py-1.5 text-uppercase">Out For Delivery</span>
                            @elseif($subOrder->status === 'delivered')
                                <span class="badge bg-success rounded-2 px-3 py-1.5 text-uppercase">Delivered</span>
                            @else
                                <span class="badge bg-danger rounded-2 px-3 py-1.5 text-uppercase">Cancelled</span>
                            @endif

                        </div>

                        <div class="list-group list-group-flush rounded-3 border">
                            @foreach($subOrder->items as $item)
                                <div class="list-group-item px-3 py-3 d-flex justify-content-between align-items-center flex-wrap gap-2 bg-white">
                                    <div>
                                        <h4 class="h6 font-weight-bold text-dark mb-1">{{ $item->product->name ?? 'Unknown Product' }}</h4>
                                        <p class="small text-muted mb-0">Qty Purchased: <span class="font-weight-bold text-dark">x{{ $item->quantity ?? 0 }}</span></p>
                                    </div>
                                    <span class="font-weight-bold text-dark">${{ number_format($item->price * ($item->quantity ?? 0), 2) }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="card-footer bg-white text-muted small px-4 py-3 border-top-0">
                <span class="font-weight-semibold text-dark d-block mb-1">Shipping Destination:</span>
                <p class="mb-0 text-truncate">{{ $order->shipping_address }}</p>
            </div>

        </div>
    @empty
        <div class="card p-5 border border-light text-center shadow-sm rounded-3">
            <div class="h3 text-muted mb-3">📦</div>
            <p class="text-secondary mb-0">You have not placed any orders yet.</p>
        </div>
    @endforelse

    <div class="d-flex justify-content-center mt-4">
        {{ $orders->links() }}
    </div>
    <a href="{{ route('invoice') }}"></a>
</div>
@endsection
