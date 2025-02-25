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
                            Products List
                        </h3>
                        <div class="pull-right">
                            {{-- <a href="{{url('prods/add')}}" class="btn btn-primary">Add prods</a> --}}
                        </div>
                    </div>
                    <div class="box-body table-responsive">
                        <table class="table table-hover" id="myTable">
                            <thead>
                                <th>S.No</th>
                                <th>prods Name</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @foreach ($prodss as $prods)
                                    <tr>
                                        <td>{{ $prods->id }}</td>
                                        <td>{{ $prods->prods_title }}</td>
                                        <td>{{ $prods->prods_description }}</td>
                                        <td>
                                            <img class="img-rounded" alt="..."
                                                src="{{ asset('uploads/prods' . '/' . $prods->prods_image) }}" alt=""
                                                width="100px;">
                                        </td>
                                        <td>
                                            <a href="{{ url('prods/show', $prods->id) }}" class="btn btn-info btn-sm"
                                                title="View  Details">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a href="{{ url('prods/edit', $prods->id) }}" class="btn btn-success btn-sm"
                                                title="Edit prods Details">
                                                <i class="fa fa-edit"></i>
                                            </a>
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
