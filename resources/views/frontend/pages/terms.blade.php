@extends('layouts.frontend')
@section('content')
    <div class="content-body">
        <section id="termsNconditions" class="section-padd">
            <div class="container">
                <h4>Terms and Conditions</h4>
                <hr>
                <div>
                    {!! $term->description !!}
                </div>
            </div>
        </section>
 
    </div>
@endsection
