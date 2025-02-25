
@extends('layouts.userdash')
@section('user-content')
    <div class="content-wrapper">
        <div class="box box-primary">
            @include('flashMsg.flashmessages')
            <div class="box-header">
                <h3>
                    Complaint Form Details
                </h3>
            </div>
            <div class="box-body table-responsive">
                <table class="table table-hover" id="myTable">
                    <thead>
                    <th>S.No</th>
                    <th>Product Name</th>
                    <th>Product Serial No</th>
                    <th>Purchased Date</th>
                    <th>Complain Category</th>
                    <th>Complain Created</th>
                    <th>Action</th>
                    </thead>
                    <tbody>
                    <?php $i = 0;?>
                    @foreach($complaints  as $complaint)
                        <?php $i++; ?>
                        <tr>
                            <td>{{$i}}</td>
                            <td>{{$complaint->product}}</td>
                            <td>{{ $complaint->productserial }}</td>
                            <td>{{ \Carbon\Carbon::parse($complaint->purchase_date)->format('M d, Y') }}</td>
                            <td>{{ $complaint->category }}</td>
                            <td>  {{ $complaint->created_at->diffForHumans() }}</td>
                            <td> 
                                <a href="{{url('complain/delete', $complaint->id)}}" class="btn btn-danger btn-sm" title="Delete Brand "><i class=" fa fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
 