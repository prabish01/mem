@extends('layouts.backend')
@section('admin-content')
    <div class="content-wrapper">
        <div class="col-md-12">
            <div class="box box-primary">
                @include('flashMsg.flashmessages')
                <div class="box-header">
                    <h3>
                        Data Details
{{--                        <div class="pull-right">--}}
{{--                            <a href="{{ url('rate/add') }}" class="btn btn-primary">Add Data</a>--}}
{{--                        </div>--}}
                    </h3>
                </div>
                <div class="box-body" >
                    <div class="col-md-6 pull-right">
                        <div class="box box-primary">
                            <div class="box-header">
                                Image
                            </div>
                            <div class="box-body">
                                <img src="{{ asset('uploads/rated'.'/'.$rate->image) }}" width="100%">
                            </div>
                        </div>
                    </div>

                    <ul class="list-group col-md-6">
                        <li class="list-group-item">
                            <strong>Title</strong> : {{ $rate->title }}
                        </li>

                        <li class="list-group-item">
                            <strong>Description</strong> : {{ $rate->description }}
                        </li>
                        <li class="list-group-item">
                            <strong>Created</strong> : {{ $rate->created_at->diffForHumans() }}
                        </li>
                        <li class="list-group-item">
                            <strong>Updated</strong> : {{ $rate->updated_at->diffForHumans() }}
                        </li>
                    </ul>
                    <a href="{{url('rate/edit', $rate->id)}}" class="btn btn-primary"> Edit This Data</a>
                </div>
            </div>
        </div>
    </div>
@endsection
