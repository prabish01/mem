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
                    Catalogue Images List
                </h3>
                <div class="pull-right">
                    <a href="{{url('catalogue/add')}}" class="btn btn-primary">Add catalogue</a>
                </div>
            </div>
            <div class="box-body table-responsive">
                <table class="table table-hover" id="myTable">
                    <thead>
                    <th>S.No</th>
                    <th>catalogue Name</th>
                    <th>Image</th> 
                    <th>Action</th>
                    </thead>
                    <tbody> 
                    @foreach($catalogues  as $catalogue) 
                        <tr>
                            <td>{{$catalogue->id}}</td>
                            <td>{{$catalogue->catalogue_title}}</td>
                            <td>
                                <img class="img-rounded" alt="..."  src="{{asset('uploads/catalogue'.'/'. $catalogue->catalogue_title .'/'.$catalogue->page)}}" alt="" width="100px;">
                            </td> 
                            <td> 
                                <a href="{{url('catalogues', $catalogue->id)}}" target="_blank" rel="noopener noreferrer" class="btn btn-info btn-sm" title="View  Details">
                                    <i class="fa fa-eye"></i>
                                </a>

                                <a href="{{url('catalogue/edit', $catalogue->id)}}" class="btn btn-success btn-sm" title="Edit catalogue Details">
                                    <i class="fa fa-edit"></i>
                                </a>
                                 @if ($catalogue->catalogue_pdf!="" )
                                <a href="{{url('catalogue/pdf', $catalogue->id)}}" class="btn btn-info btn-sm" title="Download Catalogue"><i class="fa fa-download"></i></a>
                                @endif
                                <a href="{{url('catalogue/delete', $catalogue->id)}}" class="btn btn-danger btn-sm" title="Delete catalogue "><i class=" fa fa-trash"></i></a>
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
