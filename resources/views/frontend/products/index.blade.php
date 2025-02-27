@extends('layouts.frontend')
@section('content')
<div class="content-body">
    <section id="shopPage" class="section-padd">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <h5>Filter by Categories</h5>
                    <hr>
                    @php
                    $cats = DB::table('categories')->select('id','category_name')->get();
                    @endphp
                    @foreach($cats as $cat)
                    @php $i= 0; @endphp
                    <div class="cat-li">
                        @php
                        $subcats = DB::table('sub_categories')->select('id','category_id','subcategory_name')->orderBy('id','desc')->where('category_id',$cat->id)->get();
                        @endphp
                        @if($subcats->count() > 0)
                        <a href="{{ URL::to('/product/category',$cat->id) }}">
                            {{$cat->category_name}}
                        </a>
                        @else
                        <a href="{{ URL::to('/product/category',$cat->id) }}">
                            {{$cat->category_name}}
                        </a>
                        @endif
                        <a href="" class="collapsed subplus" data-toggle="collapse" data-target="#products1">+</a>
                    </div>
                    <ul class="sub-menu collapse" id="products1">
                        @foreach($subcats as $subcat)
                        <li><a href="{{ URL::to('/product/subcategory',$subcat->id) }}">{{$subcat->subcategory_name}}</a></li>
                        @endforeach
                    </ul>
                    @endforeach
                </div>

                @include('frontend.products.allproducts')
            </div>
        </div>
    </section>

    @include('frontend.includes.newsletter')

</div>
@endsection