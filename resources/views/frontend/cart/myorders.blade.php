@extends('layouts.frontend')
@section('content')
    <div class="content-body">
        <section id="aboutUs" class="section-padd">
            <div class="container">
                <div class="text-left mb-4">
                    <h2>My Orders Till Date</h2>
                    @include('flashMsg.flashmessages')
                </div>
                <table id="cartTable">
                    <tbody>
                    <tr>
                        <th width="10%">S.N.</th>
                        <th width="15%">Ordered By</th>
                        <th width="35%">Total Price</th>
                        <th width="10%">Ordered Date</th>
                        <th width="20%">Is Delivered</th>
                        <th width="10%">Action</th>
                    </tr>
                    <?php $i = 0;?>
                    @foreach($orders as $order)
                        <?php $i++; ?>
                        <tr>
                            <td>{{$i}}</td>
                            <td>{{$order->orderedBy->name}}</td>
                            <td>{{$order->total}}</td>
                            <td>{{$order->created_at->diffForHUmans()}}</td>
                            <td>
                                @if($order->delivered == 0)
                                    Pending
                                @else
                                    Delivered
                                @endif

                            </td>
                            <td>
                                <a href="{{url('cart/vieworder', $order->id)}}" class="btn btn-info btn-sm" title="View  Details">
                                    View Details
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </section>
 
    </div>
@endsection
