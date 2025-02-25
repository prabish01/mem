@extends('layouts.backend')
@section('admin-content')
    <div class="content-wrapper">
        <div class="col-md-12">
            <div class="box box-primary">
                @include('flashMsg.flashmessages')
                <div class="box-header">
                    <h3>
                        Slider Details
                        <div class="pull-right">
                            <a href="{{ url('slider/add') }}" class="btn btn-primary">Add Slider</a>
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
                                <img src="{{ asset('uploads/slider'.'/'.$slider->image) }}" width="100%">
                            </div>
                        </div>
                    </div>

                    <ul class="list-group col-md-6">
                        <li class="list-group-item">
                            <strong>Title</strong> : {{ $slider->title }}
                        </li>
                        <li class="list-group-item">
                            <strong>Enabled</strong> :
                            @if($slider->show == 1)
                                Show <a href="{{url('slider/disable', $slider->id)}}" class="btn btn-danger btn-xs">Hide This Slider</a>
                            @else
                                Hide <a href="{{url('slider/enable', $slider->id)}}" class="btn btn-success btn-xs"> Show This Slider</a>
                            @endif
                        </li>
                    </ul>
                    <a href="{{url('slider/edit', $slider->id)}}" class="btn btn-primary"> Edit This Slider</a>
                </div>
            </div>
        </div>
    </div>
@endsection
