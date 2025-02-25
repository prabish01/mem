@extends('layouts.frontend')
@section('content')
    <div class="content-body">
        <section id="privacyPolicy" class="section-padd">
            <div class="container">
                <h4>Delivery Information</h4>
                <hr>
                <div>
                    {!! $delivery->description !!}
                </div>
            </div>
        </section>
 


    </div>
@endsection
