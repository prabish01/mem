@extends('layouts.backend')
@section('admin-content')
    <div class="content-wrapper">
        <div class="panel panel-default" style="padding: 3px; margin:3px;">
            <div class="panel-body">
                <div class="box box-primary">
                    <div class="p-2">
                        @include('flashMsg.flashmessages')
                    </div>
                    <div class="box-header">
                        <h3>
                            Products Link List
                        </h3>
                        <div class="pull-right">
                            <a href="{{url('prodslink/add')}}" class="btn btn-primary">Add New Product Link </a>
                        </div>
                    </div>
                    <div class="box-body table-responsive">
                        <table class="table table-hover" id="myTable">
                            <thead>
                                <th>S.No</th>
                                <th>prodslink Link Name</th> 
                                <th>Image</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @foreach ($prodslinks as $prodslink)
                                    <tr>
                                        <td>{{ $prodslink->id }}</td>
                                        <td>{{ $prodslink->title }}</td> 
                                        <td>
                                            <img class="img-rounded" alt="..."
                                                src="{{ asset('uploads/prodslink' . '/' . $prodslink->filename) }}" alt=""
                                                width="100px;">
                                        </td>
                                        <td>
                                            <a href="{{ url('prodslink/show', $prodslink->id) }}" class="btn btn-info btn-sm"
                                                title="View  Details">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            {{-- <a href="{{ url('prodslink/edit', $prodslink->id) }}" class="btn btn-success btn-sm"
                                                title="Edit prodslink Details">
                                                <i class="fa fa-edit"></i>
                                            </a> --}}
                                            <a href="{{url('prodslink/delete', $prodslink->id)}}" class="btn btn-danger btn-sm" title="Delete"><i class=" fa fa-trash"></i></a>
                                         </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
