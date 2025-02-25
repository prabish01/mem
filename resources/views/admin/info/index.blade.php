@extends('layouts.backend')
@section('admin-content')
    <div class="content-wrapper">
        <div class="box box-primary">
            @include('flashMsg.flashmessages')
            <div class="box-header">
                <h3>
                    Contact Info
                </h3>
                <div class="pull-right">
                    <a href="{{url('info/add')}}" class="btn btn-primary">Add Contact</a>
                </div>
            </div>
            <div class="box-body table-responsive">
                <table class="table table-hover" id="myTable">
                    <thead>
                    <th>S.No</th>
                    <th> Address</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Action</th>
                    </thead>
                    <tbody>
                    <?php $i = 0;?>
                    @foreach($infos  as $info)
                        <?php $i++; ?>
                        <tr>
                            <td>{{$i}}</td>
                            <td>{{$info->address}}</td>
                            <td>{{$info->phone}}</td>
                            <td>{{ \Illuminate\Support\Str::limit($info->email,30) }}</td>
                            <td>
                                <a href="{{url('info/edit', $info->id)}}" class="btn btn-success btn-sm" title="Edit Product Details">
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
@endsection
