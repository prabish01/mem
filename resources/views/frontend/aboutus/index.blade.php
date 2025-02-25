@extends('layouts.frontend')
@section('content')
    <div class="content-body">
        <section id="aboutUs" class="section-padd">
            <div class="container">
                <h4>About Us</h4>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        {!! $about->description !!}
                    </div>
                    <div class="col-md-6">
                        <img src="{{ asset('uploads/about'.'/'.$about->image) }}">
                    </div>
                </div>
            </div>
        </section>
 
    </div>
@endsection
