@extends('layouts.backend')
@section('admin-content')
    <div class="content-wrapper">
        <div class="box box-primary">
            @include('flashMsg.flashmessages')
            <div class="box-header">
                <h3>
                    Data
                </h3>
{{--                <div class="pull-right">--}}
{{--                    <a href="{{url('rate/add')}}" class="btn btn-primary">Add Data</a>--}}
{{--                </div>--}}
            </div>
            <div class="box-body table-responsive">
                <table class="table table-hover" id="myTable">
                    <thead>
                    <th>S.No</th>
                    <th> Title</th>
                    <th>Description</th>
                    <th>Show on Front</th>
                    <th>Action</th>
                    </thead>
                    <tbody>
                    <?php $i = 0;?>
                    @foreach($rates  as $rate)
                        <?php $i++; ?>
                        <tr>
                            <td>{{$i}}</td>
                            <td>{{$rate->title}}</td>
                            <td>{{ \Illuminate\Support\Str::limit($rate->description,30) }}</td>
                            <td>
                                @if($rate->enabled == 1)
                                    Enabled <a href="{{url('rate/disable', $rate->id)}}" class="btn btn-danger btn-xs">Disable</a>
                                @else
                                    Disabled <a href="{{url('rate/enable', $rate->id)}}" class="btn btn-success btn-xs"> Enable</a>
                                @endif

                            </td>
                            <td>
                                <a href="{{url('rate/show', $rate->id)}}" class="btn btn-info btn-sm" title="View  Details">
                                    <i class="fa fa-eye"></i>
                                </a>

                                <a href="{{url('rate/edit', $rate->id)}}" class="btn btn-success btn-sm" title="Edit Product Details">
                                    <i class="fa fa-edit"></i>
                                </a>

                                <a href="{{url('rate/delete', $rate->id)}}" class="btn btn-danger btn-sm" title="Delete Product "><i class=" fa fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
