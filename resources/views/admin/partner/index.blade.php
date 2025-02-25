@extends('layouts.backend')
@section('admin-content')
    <div class="content-wrapper">
        <div class="box box-primary">
            @include('flashMsg.flashmessages')
            <div class="box-header">
                <h3>
                    Partner Images List
                </h3>
                <div class="pull-right">
                    <a href="{{url('partner/add')}}" class="btn btn-primary">Add Partner</a>
                </div>
            </div>
            <div class="box-body table-responsive">
                <table class="table table-hover" id="myTable">
                    <thead>
                    <th>S.No</th>
                    <th>Partner Name</th>
                    <th>Image</th>
                    <th>Action</th>
                    </thead>
                    <tbody>
                    <?php $i = 0;?>
                    @foreach($partners  as $partner)
                        <?php $i++; ?>
                        <tr>
                            <td>{{$i}}</td>
                            <td>{{$partner->title}}</td>
                            <td>
                                <img src="{{asset('uploads/partner'.'/'.$partner->image)}}" alt="" width="40px;">
                            </td>
                            <td>
                                <a href="{{url('partner/show', $partner->id)}}" class="btn btn-info btn-sm" title="View  Details">
                                    <i class="fa fa-eye"></i>
                                </a>

                                <a href="{{url('partner/edit', $partner->id)}}" class="btn btn-success btn-sm" title="Edit Partner Details">
                                    <i class="fa fa-edit"></i>
                                </a>

                                <a href="{{url('partner/delete', $partner->id)}}" class="btn btn-danger btn-sm" title="Delete Partner "><i class=" fa fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
