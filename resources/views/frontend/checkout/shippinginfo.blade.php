@extends('layouts.frontend')
@section('content')
    <div class="content-body">
        <section id="aboutUs" class="section-padd">
            <div class="container m-5" style="min-height: 200px; margin:auto;">
            <div class="card p-5">
                <div class="row">
                    <div class="col-md-7">
                        <table id="checkoutTable">
                            <tbody>
                            <tr>
                                <th width="10%">S.N.</th>
                                <th width="35%">Products</th>
                                <th width="20%">Price</th>
                            </tr>
                            <?php $i = 0;?>
                            @foreach($cartitems as $cartitem)
                                <?php $i++; ?>
                            <tr>
                                <td>{{$i}}</td>
                                <td>{{$cartitem->name}}</td>
                                <td>Rs.{{$cartitem->price}}*{{$cartitem->qty}}</td>
                            </tr>
                            @endforeach
                            <tr>
                                <th></th>
                                <th>Total</th>
                                <th>Rs.{{Cart::subtotal()}}</th>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-5">
                        <div class="shipping-block">
                            <h5>Shipping Details</h5>
                            <div class="title-bar"></div>
                            <form id="shippingForm" method="post" action="{{url('cart/paymentmethod')}}">
                                @csrf
                                <select id="state" name="province">
                                    <option value="0" selected disabled>Select your State</option>
                                      <option value="Province 1" @if($address->province =="Province 1") selected @endif>Province 1</option>
                                    <option value="Province 2"  @if($address->province =="Province 2") selected @endif>Province 2</option>
                                    <option value="Province 3"  @if($address->province =="Province 3") selected @endif>Province 3</option>
                                    <option value="Province 4"  @if($address->province =="Province 4") selected @endif>Province 4</option>
                                    <option value="Province 5"  @if($address->province =="Province 5") selected @endif>Province 5</option>
                                    <option value="Province 6"  @if($address->province =="Province 6") selected @endif>Province 6</option>
                                    <option value="Province 7"  @if($address->province =="Province 7") selected @endif>Province 7</option>
                                </select>
                                <input  class="form-control" type="text" name="shipping_zone" placeholder="Shipping Zone" value="{{    old('shipping_zone',$address->zone) }}"  required>
                                <input  class="form-control" type="text" name="shipping_district" placeholder="Shipping District" value="{{ old('shipping_district',$address->district ) }}"  required>
                                <input  class="form-control" type="text" name="shipping_city" placeholder="Shipping City" value="{{   old('shipping_city',$address->city ) }}" required>
                                <input  class="form-control" type="text" name="shipping_street" placeholder="Shipping Street" value="{{old('shipping_street',$address->street ) }}" required>
                                <input  class="form-control" type="number" name="phone_number" placeholder="Contact Number" value="{{old('phone_number',$address->phone_number ) }}" required>
                                <div class="text-right mt-4">
                                    <button type="submit" class="order-now-btn">Order Now</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div></div>
        </section> 
    </div>
@endsection
