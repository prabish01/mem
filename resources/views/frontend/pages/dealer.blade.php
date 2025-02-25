@extends('layouts.frontend')
@section('content')
    <div class="content-body">
        <section id="privacyPolicy" class="section-padd">
            <div class="container">
                <h4>Dealer Policy</h4>
                <hr>
                <div>
                    {!! $dealer->description !!}
                </div>
            </div>
        </section>
 


    </div>
@endsection
