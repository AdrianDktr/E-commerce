<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $product->name }}</title>
</head>
<body>
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    @endif

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
    </form>

</body>
</html>
