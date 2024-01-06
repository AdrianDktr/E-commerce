@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="background-color: white;">
                <div class="card-header">{{ __('product Detail') }}</div>

                <div class="card-body">
                    <div class="d-flex justify-content-around">
                        <div class="">
                            <img src="{{ asset('assets/product_image/' . $product->image) }}" alt="" height="200px">
                        </div>
                        <div class="">
                            <h1>{{ $product->name }}</h1>
                            <h6>{{ $product->description }}</h6>
                            <h3>Rp{{ $product->price }}</h3>
                            <hr>
                            <p>{{ $product->stock }} left</p>
                            <form action="{{ route('store_cart', $product) }}" method="post">
                                @csrf
                                <div class="input-group mb-3">
                                    <input type="number" class="form-control" aria-describedby="basic-addon2" name="amount"  value="1">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" type="submit">Add to Cart</button>
                                   </div>
                                </div>
                            </form>
                            <form action="{{ route('edit_product',$product) }}" method="get">
                                <button type="submit" class="btn btn-primary"> Edit product</button>
                            </form>
                        </div>
                    </div>
                    @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                    @endif

                </div>
            </div>

        </div>

    </div>

</div>


@endsection
{{--

<a href="{{ route('index_product') }}"> Back to product </a>
<p>Name : {{ $product->name }} </p>
<p>Description : {{ $product->description }} </p>
<p>Rp : {{ $product->price }} </p>
<p>Stock : {{ $product->stock }} </p>
<img src="{{ asset('assets/product_image/' . $product->image) }}" alt="" height="100px">
<form action="{{ route('edit_product',$product) }}" method="get">
<button> Edit product</button>
</form>

<form action="{{ route('store_cart', $product) }}" method="post">
@csrf
<input type="number" name="amount"  value="1">
<button type="submit">Add to Cart</button>
</form> --}}
