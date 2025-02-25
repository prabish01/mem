@extends('layouts.backend')
@section('admin-content')
    <div class="content-wrapper">
        <div class="col-md-12">
            <div class="box box-primary">
                @include('flashMsg.flashmessages')
                <div class="box-header">
                    <h3>
                        Faq Details
                        <div class="pull-right">
                            <a href="{{ url('faq/add') }}" class="btn btn-primary">Add Faq</a>
                        </div>
                    </h3>
                </div>
                <div class="box-body" >

                    <ul class="list-group col-md-6">
                        <li class="list-group-item">
                            <strong>Title</strong> : {{ $faq->title }}
                        </li>>

                        <li class="list-group-item">
                            <strong>Description</strong> : {{ $faq->description }}
                        </li>
                        <li class="list-group-item">
                            <strong>Enabled</strong> :
                            @if($faq->enabled == 1)
                                Enabled <a href="{{url('faq/disable', $faq->id)}}" class="btn btn-danger btn-xs">Disable This Faq</a>
                            @else
                                Disabled <a href="{{url('faq/enable', $faq->id)}}" class="btn btn-success btn-xs"> Enable This Faq</a>
                            @endif
                        </li>
                        <li class="list-group-item">
                            <strong>Created</strong> : {{ $faq->created_at->diffForHumans() }}
                        </li>
                        <li class="list-group-item">
                            <strong>Updated</strong> : {{ $faq->updated_at->diffForHumans() }}
                        </li>
                    </ul>
                    <a href="{{url('faq/edit', $faq->id)}}" class="btn btn-primary"> Edit This Faq</a>
                </div>
            </div>
        </div>


    </div>
@endsection
