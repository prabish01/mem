
@extends('layouts.userdash')
@section('user-content')
    <!-- Content Header (Page header) -->
    
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
              Dashboard
              <small>Control panel</small>
            </h1>
            <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
              <li class="active">My  Orders</li>
            </ol>
          </section>
          <br>
          @include('flashMsg.flashmessages')
        <div class="box box-primary  p-10">
            <div class="box-header">
                <h3>
                    All Orders
                </h3>
            </div>
            <div class="box-body">
                <table class="table table-hover" id="myTable">
                    <thead>
                        <th>S.No</th>
                        <th>Ordered By</th>
                        <th>Total Price</th>
                        <th>Is Delivered</th>
                        <th>Payment type</th>
                        <th>Ordered time</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        <?php $i = 0;?>
                        @foreach($orders  as $order)
                        <?php $i++; ?>
                        <tr>
                            <td>{{$i}}</td>
                            <td>{{$order->orderedBy->name}}</td>
                            <td>{{$order->total}}</td>
                            <td>
                                @if($order->delivered == 0)
                                <span class="text-info text-bold">Pending</span>
                                 @else
                                 <span class="text-success text-bold">Delivered</span> 
                                @endif

                            </td>
                            <td>
                                @if($order->payment_type == 1)
                                    On Delivery
                                @else
                                    Khalti Payment
                                @endif
                            </td>
                            <td>{{$order->created_at->diffForHUmans()}}</td>
                            <td>
                                <a href="{{url('showorderdetails', $order->id)}}" class="btn btn-info btn-sm" title="View  Details">
                                 <i class="fa fa-eye"></i>
                                </a> 
                            </td>
                        </tr>
                        @endforeach
                  </tbody>
                  
                </table>
            </div>
        </div>
    </div>
@endsection