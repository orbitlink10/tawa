@extends('theme.lucare.layouts.main')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/5.0.0-beta3/css/bootstrap.min.css" rel="stylesheet">

@section('main')
    <!-- Page Header Start -->
    <section class="page-header bg-light py-5">
        <div class="page-header-bg" style="background-image: url('{{ asset('assets/images/backgrounds/page-header-bg.jpg') }}'); background-size: cover; background-position: center;"></div>
        <div class="container">
            <div class="page-header__inner">
                <ul class="breadcrumb list-unstyled d-flex">
                    <li class="breadcrumb-item"><a href="/" class="text-dark">Home</a></li>
                    <li class="breadcrumb-item active text-dark">Cart</li>
                </ul>
                <h2 class="page-header-title text-dark">Cart</h2>
            </div>
        </div>
    </section>
    <!-- Page Header End -->

    <!-- Start Cart Page -->
    <section class="cart-page py-5 bg-light">
        <div class="container">


                 @if (session('registration_success'))
                                    <div class="alert alert-success">{!! session('registration_success') !!}</div>
                                @endif

                                @if (session('error'))
                                    <div class="alert alert-danger">{{ session('error') }}</div>
                                @endif

                                
            @if($cart && count($cart) > 0)
                <div class="table-responsive">
                    <table class="table table-bordered cart-table">
                        <thead class="thead-light">
                            <tr>
                                <th>Item</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th>Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $subtotal = 0; @endphp
                            @foreach ($cart as $id => $item)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="img-box me-3">
                                                <img src="{{ $item['image_src'] ?? (!empty($item['photo']) ? asset('storage/'.$item['photo']) : asset('lucare/assets/imgs/shop/product-placeholder.svg')) }}" alt="" class="img-fluid" width="100">
                                            </div>
                                            <h5 class="mb-0"><a href="#" class="text-dark">{{ $item['name'] }}</a></h5>
                                        </div>
                                    </td>
                                    <td>KSh {{ number_format($item['price'], 2) }}</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <form action="{{ route('cart.update') }}" method="POST" class="d-flex">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $id }}">
                                                <button type="submit" name="action" value="decrease" class="btn btn-sm btn-outline-secondary me-2">
                                                    <i class="bi bi-dash"></i>
                                                </button>
                                                <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1" class="form-control text-center w-50 border-secondary" />
                                                <button type="submit" name="action" value="increase" class="btn btn-sm btn-outline-secondary ms-2">
                                                    <i class="bi bi-plus"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                    <td>KSh {{ number_format($item['price'] * $item['quantity'], 2) }}</td>
                                    <td>
                                        <form action="{{ route('cart.remove') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $id }}">
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="bi bi-x"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @php $subtotal += $item['price'] * $item['quantity']; @endphp
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="row">
                    <div class="col-lg-8"></div>
                    <div class="col-lg-4">
                        <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Subtotal</span>
                                <span>KSh {{ number_format($subtotal, 2) }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Shipping Cost</span>
                                <span>KSh 0.00</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <strong>Total</strong>
                                <strong>KSh {{ number_format($subtotal, 2) }}</strong>
                            </li>
                        </ul>
                        <div class="mt-3 d-flex justify-content-between">
                            @auth
                                <a href="{{ route('cart.checkout') }}" class="btn btn-primary">Proceed to Checkout</a>
                            @else
                           

                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#registerModal">
                                    Proceed to checkout.
                                </button>




@include('cart.modals.login')
@include('cart.modals.register')
                            @endauth
                        </div>
                    </div>
                </div>
            @else
                <div class="text-center">
                    <h4>Your cart is empty</h4>
                    <a href="{{ route('product') }}" class="btn btn-primary">Return to Shop</a>
                </div>
            @endif
        </div>
    </section>
    <!-- End Cart Page -->
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.0.0-beta3/js/bootstrap.min.js"></script>
@endsection
