@extends('layouts.frontend')
@section('content')
    <div class="content-body">
        <section id="shopPage" class="section-padd">
            <div class="container">
                <div class="row"> 
                    @include('frontend.products.allproducts')
                </div>
            </div>
        </section> 
    </div>
@endsection
