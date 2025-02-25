@extends('layouts.frontend')
@section('content')
    <div class="content-body">
        <section id="privacyPolicy" class="section-padd">
            <div class="container">
                <h4>Privacy Policy</h4>
                <hr>
                <div>
                    {!! $privacy->description !!}
                </div>
            </div>
        </section>
 


    </div>
@endsection
