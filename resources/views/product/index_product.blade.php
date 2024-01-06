@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" style="background-color: white;">
                    <div class="card-header">{{ __('product') }}</div>
                    <div class="card-group m-auto">
                        @foreach($product as $products)
                            <div class="card m-3" style="width: 18rem;">
                                <img class="card-img-top" src="{{ asset('assets/product_image/' . $products->image) }}" alt="card image cap">

                                <div class="card-body">
                                    <p class="card-text">{{ $products->name }}</p>

                                    <form action="{{ route('show_product', $products) }}" method="get">
                                        <button type="submit" class="btn btn-primary">Show Detail</button>
                                    </form>

                                    <form action="{{ route('delete_product', $products) }}" method="post">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-danger mt-2">Delete Product</button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
