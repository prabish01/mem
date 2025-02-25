@extends('layouts.frontend')
@section('content')
    <div class="content-body">
        <section id="termsNconditions" class="section-padd">
            <div class="container">
                <h4>Return Policy</h4>
                <hr>
                <div>
                    {!! $return->description !!}
                </div>
            </div>
        </section>
 
    </div>
@endsection
