<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index Product</title>
</head>
<body>
    @foreach($product as $products)
    
    <p>Name : {{ $products->name }} </p>
    <p>Description : {{ $products->description }} </p>
    <p>Rp : {{ $products->price }} </p>
    <p>Stock : {{ $products->stock }} </p>
    <img src="{{ asset('assets/product_image/' . $products->image) }}" alt="" height="100px">
    @endforeach
</body>
</html>
