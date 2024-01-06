@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="background-color: white;">
                <div class="card-header">{{ __('Update Product') }}</div>

                <div class="card-body">
                    <form action="{{ route('update_product', $product) }}" method="POST" enctype="multipart/form-data">
                        @method('patch')
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" value="{{ $product->name }}" class="form-control" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" name="description" value="{{ $product->description }}" placeholder="Description" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="number" name="price" value="{{ $product->price }}" placeholder="Price" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="stock">Stock</label>
                            <input type="number" name="stock" value="{{ $product->stock }}" class="form-control" placeholder="Stock">
                        </div>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" name="image" class="form-control" accept="image/*">
                        </div>

                        <button type="submit" class="btn btn-primary mt-3">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
