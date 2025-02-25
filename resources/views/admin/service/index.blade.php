@extends('layouts.backend')
@section('admin-content')
    <div class="content-wrapper">
        <div class="box box-primary">
            @include('flashMsg.flashmessages')
            <div class="box-header">
                <h3>
                    Services
                </h3>
{{--                <div class="pull-right">--}}
{{--                    <a href="{{url('service/add')}}" class="btn btn-primary">Add Service</a>--}}
{{--                </div>--}}
            </div>
            <div class="box-body table-responsive">
                <table class="table table-hover" id="myTable">
                    <thead>
                    <th>S.No</th>
                    <th> Name</th>
                    <th>Description</th>
                    <th>Action</th>
                    </thead>
                    <tbody>
                    <?php $i = 0;?>
                    @foreach($services  as $service)
                        <?php $i++; ?>
                        <tr>
                            <td>{{$i}}</td>
                            <td>{{$service->title}}</td>
                            <td>{{ \Illuminate\Support\Str::limit($service->description,30) }}</td>
                            <td>
                                <a href="{{url('service/show', $service->id)}}" class="btn btn-info btn-sm" title="View  Details">
                                    <i class="fa fa-eye"></i>
                                </a>

                                <a href="{{url('service/edit', $service->id)}}" class="btn btn-success btn-sm" title="Edit Product Details">
                                    <i class="fa fa-edit"></i>
                                </a>

                                <a href="{{url('service/delete', $service->id)}}" class="btn btn-danger btn-sm" title="Delete Product "><i class=" fa fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
