@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="background-color: white;">
                <div class="card-header">{{ __('Show Detail Order') }}</div>

                <div class="card-body">
                    @php
                        $total_price = 0;
                    @endphp

                <h5 class="card-title">Order Number {{ $order->id }}</h5>
                    <h6 class="card-subtitle-mb2 text-muted">By {{ $order->user->name }}</h6>
                    @if ($order->is_paid==true)
                        <p class="card-text">Paid</p>
                    @else
                        <p class="card-text">Unpaid</p>
                    @endif
                    <hr>
                    @foreach ( $order->transactions as $transaction )
                    <p>
                        <strong>Product</strong>     : {{ $transaction->product->name }}
                        <br>
                        Total Item

                        <strong>                        </strong>
                        :{{ $transaction->amount }}
                    </p>
                    @php
                        $total_price = $transaction->product->price * $transaction->amount;
                    @endphp

                    @endforeach

                    <p><strong>Total : Rp {{ $total_price }}</strong></p>

                    <hr>
                    @if ($order->is_paid == false && $order->payment_receipt == null)
                        <form action="{{ route('submit_payment_receipt',$order) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="payment_receipt">Uploud your Payment Receipt </label>
                                <input type="file" class="form-control" name="payment_receipt" id="payment_receipt">
                            </div>
                                <button type="submit" class="btn btn-primary mt-3">Submit Payment</button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

