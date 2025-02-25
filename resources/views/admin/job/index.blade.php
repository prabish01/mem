@extends('layouts.backend')
@section('admin-content')
    <div class="content-wrapper">
        <div class="box box-primary">
            @include('flashMsg.flashmessages')
            <div class="box-header">
                <h3>
                   Job Vacancy List
                </h3>
                <div class="pull-right">
                    <a href="{{url('job/add')}}" class="btn btn-primary">Add Job Vacancy</a>
                </div>
            </div>
            <div class="box-body table-responsive">
                <table class="table table-hover" id="myTable">
                    <thead>
                    <th>S.No</th>
                    <th>Job Name</th>
                    <th>Show On Front</th>
                    <th>Action</th>
                    </thead>
                    <tbody>
                    <?php $i = 0;?>
                    @foreach($jobs  as $job)
                        <?php $i++; ?>
                        <tr>
                            <td>{{$i}}</td>
                            <td>{{$job->title}}</td>
                            <td>
                                @if($job->enabled == 1)
                                    Show <a href="{{url('job/disable', $job->id)}}" class="btn btn-danger btn-xs">Hide This Vacancy</a>
                                @else
                                    Hide <a href="{{url('job/enable', $job->id)}}" class="btn btn-success btn-xs"> Show This Vacancy</a>
                                @endif

                            </td>
                            <td>
                                <a href="{{url('job/edit', $job->id)}}" class="btn btn-success btn-sm" title="Edit Slider Details">
                                    <i class="fa fa-edit"></i>
                                </a>

                                <a href="{{url('job/delete', $job->id)}}" class="btn btn-danger btn-sm" title="Delete Slider "><i class=" fa fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
