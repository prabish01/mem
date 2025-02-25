@extends('layouts.backend')
@section('admin-content')
    <div class="content-wrapper">
        <div class="col-md-12">
            <div class="box box-primary" style="min-height: 700px;">
                @include('flashMsg.flashmessages')
                <div class="box-header">
                    <h3>
                        Products Details 
                    </h3>
                </div>
                <div class="box-body" >
                    <div class="col-md-6 pull-right">
                        <div class="box box-primary">
                            <div class="box-header">
                                Image
                            </div>
                            <div class="box-body">
                                <img src="{{ asset('uploads/prods'.'/'. $prods->prods_image) }}" width="100%" style="max-height:500px;">
                            </div>
                        </div>
                    </div>

                    <ul class="list-group col-md-6">
                        <li class="list-group-item">
                            <strong>Title</strong> : {{ $prods->prods_title }}
                        </li>
                        <li class="list-group-item">
                            <strong>Description</strong> :<p class="para">{{ $prods->prods_description }} </p>
                        </li> 
                    </ul>
                    <a href="{{url('prods/edit', $prods->id)}}" class="btn btn-primary"> Edit This Product</a>
                </div>
            </div>
        </div>
    </div>
@endsection
