@extends('layouts.backend')
@section('admin-content')
    <div class="content-wrapper">
        <div class="box box-primary">
            @include('flashMsg.flashmessages')
            <div class="box-header">
                <h3>
                    Slider Images List
                </h3>
                <div class="pull-right">
                    <a href="{{url('slider/add')}}" class="btn btn-primary">Add Slider</a>
                </div>
            </div>
            <div class="box-body table-responsive">
                <table class="table table-hover" id="myTable">
                    <thead>
                    <th>S.No</th>
                    <th>Slider Name</th>
                    <th>Image</th>
                    <th>Show On Front</th>
                    <th>Action</th>
                    </thead>
                    <tbody>
                    <?php $i = 0;?>
                    @foreach($sliders  as $slider)
                        <?php $i++; ?>
                        <tr>
                            <td>{{$i}}</td>
                            <td>{{$slider->title}}</td>
                            <td>
                                <img src="{{asset('uploads/slider'.'/'.$slider->image)}}" alt="" width="40px;">
                            </td>
                            <td>
                                @if($slider->show == 1)
                                    Show <a href="{{url('slider/disable', $slider->id)}}" class="btn btn-danger btn-xs">Hide This Slider</a>
                                @else
                                    Hide <a href="{{url('slider/enable', $slider->id)}}" class="btn btn-success btn-xs"> Show This SLider</a>
                                @endif

                            </td>
                            <td>
                                <a href="{{url('slider/show', $slider->id)}}" class="btn btn-info btn-sm" title="View  Details">
                                    <i class="fa fa-eye"></i>
                                </a>

                                <a href="{{url('slider/edit', $slider->id)}}" class="btn btn-success btn-sm" title="Edit Slider Details">
                                    <i class="fa fa-edit"></i>
                                </a>

                                <a href="{{url('slider/delete', $slider->id)}}" class="btn btn-danger btn-sm" title="Delete Slider "><i class=" fa fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
