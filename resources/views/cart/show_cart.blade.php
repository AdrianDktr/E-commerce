@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="background-color: white;">
                <div class="card-header">{{ __('Update Product') }}</div>

                <div class="card-body">
                    @if ($carts->isEmpty())
                        <p>Your cart is empty.</p>
                    @else
                        <div class="card-group m-auto">
                            @foreach ($carts as $cart)
                                <div class="card m-3" style="width: 14rem;">
                                    <img class="card-img-top" src="{{ asset('assets/product_image/' . $cart->product->image) }}">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $cart->product->name }}</h5>
                                        <form action="{{ route('update_cart', $cart) }}" method="post">
                                            @method('patch')
                                            @csrf
                                            <div class="input-group mb-5">
                                                <input type="number" name="amount" value="{{ $cart->amount }}" aria-describedby="basic-addon2" class="form-control">
                                                <div class="input-group-append">
                                                    <button type="submit" class="btn btn-outline-secondary">Update Amount</button>
                                                </div>
                                            </div>
                                        </form>
                                        <form action="{{ route('delete_cart', $cart) }}" method="post">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger">Delete Cart</button>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="d-flex justify-content-end">
                            <form action="{{ route('checkout') }}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-primary">Checkout</button>
                            </form>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
