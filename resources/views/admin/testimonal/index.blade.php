@extends('layouts.backend')
@section('admin-content')
    <div class="content-wrapper">
        <div class="box box-primary">
            @include('flashMsg.flashmessages')
            <div class="box-header">
                <h3>
                    Testimonals
                </h3>
                <div class="pull-right">
                    <a href="{{url('testimonal/add')}}" class="btn btn-primary">Add Testimonal</a>
                </div>
            </div>
            <div class="box-body table-responsive">
                <table class="table table-hover" id="myTable">
                    <thead>
                    <th>S.No</th>
                    <th>Name</th>
                    <th>Rating</th>
                    <th>Description</th>
                    <th>Action</th>
                    </thead>
                    <tbody>
                    <?php $i = 0;?>
                    @foreach($testimonals  as $testimonal)
                        <?php $i++; ?>
                        <tr>
                            <td>{{$i}}</td>
                            <td>{{$testimonal->title}}</td>
                            <td>{{$testimonal->rating}}</td>
                            <td>{{ \Illuminate\Support\Str::limit($testimonal->description,30) }}</td>
                            <td>
                                <a href="{{url('testimonal/show', $testimonal->id)}}" class="btn btn-info btn-sm" title="View  Details">
                                    <i class="fa fa-eye"></i>
                                </a>

                                <a href="{{url('testimonal/edit', $testimonal->id)}}" class="btn btn-success btn-sm" title="Edit Product Details">
                                    <i class="fa fa-edit"></i>
                                </a>

                                <a href="{{url('testimonal/delete', $testimonal->id)}}" class="btn btn-danger btn-sm" title="Delete Product "><i class=" fa fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
