@extends('layouts.frontend')
@section('content')
    <div class="content-body">
        <section id="FAQ" class="section-padd">
            <div class="container">
                <div id="accordion">
                    @foreach($faqs as $key=>$faq)
                    <div class="card">
                        <div class="card-header" id="a{{$key}}">
                            <h5 class="mb-0">
                                <a class="btn btn-link" data-toggle="collapse" data-target="#collapse{{$key}}" aria-expanded="true" aria-controls="collapse{{$key}}">
                                  {{$key+1}}. {{$faq->title}}
                                </a>
                            </h5>
                        </div>

                        <div id="collapse{{$key}}" class="collapse" aria-labelledby="a{{$key}}" data-parent="#accordion">
                            <div class="card-body">
                                {!! $faq->description !!}
                            </div>
                        </div>
                    </div>
                     @endforeach
                </div>
            </div>
        </section>
 
    </div>
@endsection
