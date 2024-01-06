<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show Order</title>
</head>
<body>
<p>ID      : {{ $order->id }}</p>
<p>User    : {{ $order->user->name }}</p>
@foreach    ( $order->transactions as $transaction )
<p>Product : {{ $transaction->product->name }}</p>
<p>Amount  : {{ $transaction->amount }}</p>
@endforeach

@if ($order->is_paid == false && $order->payment_receipt == null)
    <form action="{{ route('submit_payment_receipt',$order) }}" method="post" enctype="multipart/form-data">
        @csrf
    <label for="payment_receipt">Uploud Payment Receipt </label>
        <input type="file" name="payment_receipt" id="payment_receipt">
        <button type="submit">Submit Payment</button>
    </form>
@endif
<p></p>
</body>
</html>
