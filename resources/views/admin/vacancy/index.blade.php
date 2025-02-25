@extends('layouts.backend')
@section('admin-content')
    <div class="content-wrapper">
        <div class="box box-primary">
            @include('flashMsg.flashmessages')
            <div class="box-header">
                <h3>
                   Career Form
                </h3>
            </div>
            <div class="box-body table-responsive">
                <table class="table table-hover" id="myTable">
                    <thead>
                    <th>S.No</th>
                    <th> Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>CV</th>
                    <th>Action</th>
                    </thead>
                    <tbody>
                    <?php $i = 0;?>
                    @foreach($vacancyy  as $vacancy)
                        <?php $i++; ?>
                        <tr>
                            <td>{{$i}}</td>
                            <td>{{$vacancy->name}}</td>
                            <td>{{ $vacancy->email }}</td>
                            <td>{{ $vacancy->phone }}</td>
							<td> <a href="{{ url('/career/pdf',$vacancy->id) }}"><i class=" fa fa-download"></i></a></td>
                            <td>
                                <a href="{{url('career/show', $vacancy->id)}}" class="btn btn-info btn-sm" title="View  Details">
                                    <i class="fa fa-eye"></i>
                                </a>

                                <a href="{{url('career/delete', $vacancy->id)}}" class="btn btn-danger btn-sm" title="Delete Brand "><i class=" fa fa-trash"></i></a>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
