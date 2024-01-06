@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="background-color: white;">
                <div class="card-header">{{ __('Update Product') }}</div>

                <div class="card-body">
                    <form action="{{ route('store_product') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" name="name" placeholder="Name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for=""></label>
                            <input type="text" name="description" placeholder="Description" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for=""></label>
                            <input type="number" name="price" placeholder="Price" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for=""></label>
                            <input type="number" name="stock" placeholder="Stock" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for=""></label>
                            <input type="file" name="image" placeholder="Image" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for=""></label>
                            <button type="submit" class="btn btn-primary mt-3">Submit Data</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection



