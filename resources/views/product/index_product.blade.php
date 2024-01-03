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
    <img src="{{ asset('assets/product_image/' . $products->image) }}" alt="" height="100px">
    <form action="{{ route('show_product',$products) }}" method="get">
        <button type="submit">Show Detail</button>
    </form>

    <form action="{{ route('delete_product', $products) }}" method="post">
        @method('delete')
        @csrf
    <button type="submit">Delete Proudct</button>
    </form>
    @endforeach


</body>
</html>
