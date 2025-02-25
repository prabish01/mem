@extends('layouts.frontend')
@section('content')
    <div class="content-body">
        <section id="blogList" class="section-padd">
            <div class="container">
                <h4>Blogs</h4>
                <hr>
                @if(!empty($blogs))
                <div class="row">
                    @foreach($blogs as $blog)
                    <div class="col-md-4">
                        <div class="blog-card">
                            <div class="blog-card-img-wrap">
                                <img src="{{asset('uploads/blog/'.$blog->image)}}">
                            </div>
                            <div class="blog-txt">
                                <div class="blog-date">
                                    <i class="fa fa-clock mr-1"></i> {{ \Carbon\Carbon::parse($blog->blog_date)->format('M d, Y') }}
                                </div>
                                <h5>{!! $blog->title !!}</h5>
                                <div class="blog-excerpt">
                                   {!! \Illuminate\Support\Str::limit($blog->description,250) !!}
                                </div>
                                <a href="{{route('singleblog',$blog->id)}}" class="blog-readmore">
                                    Read More
                                </a>
                            </div>
                        </div>
                    </div>
                     @endforeach
					<div>
						{{$blogs->links()}}
					</div>
                </div>
                @endif
            </div>
        </section>

        @include('frontend.includes.newsletter')
    </div>
@endsection
