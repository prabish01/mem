@extends('layouts.frontend')
@section('content')
    <div class="content-body">
        <section id="aboutUs" class="section-padd">
            <div class="container">
                <div class="text-left mb-4">
                    <h2>Order Details</h2>
                    @include('flashMsg.flashmessages')
                </div>
                <table id="cartTable">
                    <tbody>
                    <tr>
                        <th width="10%">Order Id</th>
                        <th width="15%">Product</th>
                        <th width="35%">Qunatity</th>
{{--                        <th width="10%">Color</th>--}}
                        <th width="20%">Size</th>
                        <th width="10%">Price</th>
                    </tr>
                    @foreach($order->orderItems as $item)
                    <tr>
                        <td>{{$item->pivot->order_id}}</td>
                        <td>{{$item->product_name}}</td>
                        <td>{{$item->pivot->qty}}</td>
{{--                        <td></td>--}}
                        <td></td>
                        <td>{{$item->pivot->total}}</td>
                    </tr>
                    @endforeach
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
{{--                        <td></td>--}}
                        <td>Total Amount</td>
                        <td>Rs. {{$order->total}}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </section>
 
    </div>
@endsection
