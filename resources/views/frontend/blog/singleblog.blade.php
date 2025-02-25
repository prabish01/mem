@extends('layouts.frontend')
@section('content')
    <div class="content-body">
        <section id="singleBlog" class="section-padd">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 mx-auto my-4">
                        <h4>{!! $blog->title !!}</h4>
                        <div class="blog-date mb-3">
                            <i class="fa fa-clock mr-1"></i> {{ \Carbon\Carbon::parse($blog->blog_date)->format('M d, Y') }}
                        </div>
                        <img class="img-fluid mb-4" src="{{asset('uploads/blog/'.$blog->image)}}">
                        <div class="blog-content">
                            <p>
                               {!! $blog->description !!}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    @include('frontend.includes.newsletter')
    </div>
@endsection
