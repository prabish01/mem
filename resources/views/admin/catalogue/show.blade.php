@extends('layouts.backend')
@section('admin-content')
    <div class="content-wrapper">
        <div class="col-md-12">
            <div class="box box-primary">
                @include('flashMsg.flashmessages')
                <div class="box-header">
                    <h3>
                        Catalogue Details
                        <div class="pull-right">
                            <a href="{{ url('catalogue/add') }}" class="btn btn-primary">Add catalogue</a>
                        </div>
                    </h3>
                </div>
                <div class="box-body" >
                    <div class="col-md-6 pull-right">
                        <div class="box box-primary">
                            <div class="box-header">
                                Image
                            </div>
                            <div class="box-body">
                                <img src="{{ asset('uploads/catalogue'.'/'. $catalogue->catalogue_title .'/'.$catalogue->page) }}" width="100%">
                            </div>
                        </div>
                    </div>

                    <ul class="list-group col-md-6">
                        <li class="list-group-item">
                            <strong>Title</strong> : {{ $catalogue->catalogue_title }}
                        </li>
                       
                    </ul>
                    <a href="{{url('catalogue/edit', $catalogue->id)}}" class="btn btn-primary"> Edit This catalogue</a>
                </div>
            </div>
        </div>
    </div>
@endsection
