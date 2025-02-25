@extends('layouts.backend')
@section('admin-content')
    <div class="content-wrapper">
        <div class="box box-primary">
            @include('flashMsg.flashmessages')
            <div class="box-header">
                <h3>
                    Faqs
                </h3>
                <div class="pull-right">
                    <a href="{{url('faq/add')}}" class="btn btn-primary">Add Faq</a>
                </div>
            </div>
            <div class="box-body table-responsive">
                <table class="table table-hover" id="myTable">
                    <thead>
                    <th>S.No</th>
                    <th> Name</th>
                    <th>Description</th>
                    <th>Show On Front</th>
                    <th>Action</th>
                    </thead>
                    <tbody>
                    <?php $i = 0;?>
                    @foreach($faqs  as $faq)
                        <?php $i++; ?>
                        <tr>
                            <td>{{$i}}</td>
                            <td>{{$faq->title}}</td>
                            <td>{{ \Illuminate\Support\Str::limit($faq->description,30) }}</td>
                            <td>
                                @if($faq->enabled == 1)
                                    Enabled <a href="{{url('faq/disable', $faq->id)}}" class="btn btn-danger btn-xs">Disable</a>
                                @else
                                    Disabled <a href="{{url('faq/enable', $faq->id)}}" class="btn btn-success btn-xs"> Enable</a>
                                @endif

                            </td>
                            <td>
                                <a href="{{url('faq/show', $faq->id)}}" class="btn btn-info btn-sm" title="View  Details">
                                    <i class="fa fa-eye"></i>
                                </a>

                                <a href="{{url('faq/edit', $faq->id)}}" class="btn btn-success btn-sm" title="Edit Product Details">
                                    <i class="fa fa-edit"></i>
                                </a>

                                <a href="{{url('faq/delete', $faq->id)}}" class="btn btn-danger btn-sm" title="Delete Product "><i class=" fa fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
