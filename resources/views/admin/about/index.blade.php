@extends('layouts.backend')
@section('admin-content')
    <div class="content-wrapper">
        <div class="box box-primary">
            @include('flashMsg.flashmessages')
            <div class="box-header">
                <h3>
                    About
                </h3>
{{--                <div class="pull-right">--}}
{{--                    <a href="{{url('about/add')}}" class="btn btn-primary">Add About</a>--}}
{{--                </div>--}}
            </div>
            <div class="box-body table-responsive">
                <table class="table table-hover" id="myTable">
                    <thead>
                    <th>S.No</th>
                    <th> Title</th>
                    <th>Description</th>
                    <th>Action</th>
                    </thead>
                    <tbody>
                    <?php $i = 0;?>
                    @foreach($abouts  as $about)
                        <?php $i++; ?>
                        <tr>
                            <td>{{$i}}</td>
                            <td>{{$about->title}}</td>
                            <td>{{ \Illuminate\Support\Str::limit($about->description,30) }}</td>
                            <td>
                                <a href="{{url('about/show', $about->id)}}" class="btn btn-info btn-sm" title="View  Details">
                                    <i class="fa fa-eye"></i>
                                </a>

                                <a href="{{url('about/edit', $about->id)}}" class="btn btn-success btn-sm" title="Edit Product Details">
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
