@extends('layouts.backend')
@section('admin-content')
    <div class="content-wrapper">
        <div class="col-md-12">
            <div class="box box-primary">
                @include('flashMsg.flashmessages')
                <div class="box-header">
                    <h3>
                        Childcategory Details
                        <div class="pull-right">
                            <a href="{{ url('childcategory/add') }}" class="btn btn-primary">Add Childcategory</a>
                        </div>
                    </h3>
                </div>
                <div class="box-body" >
                    

                    <ul class="list-group col-md-12">
                        <li class="list-group-item">
                            <strong>Title</strong> : {{ $childcategory->childcategory_name }}
                        </li>
                        <li class="list-group-item">
                            <strong>Category</strong> : {{ $childcategory->parentCategory['category_name'] }}
                        </li>

                        <li class="list-group-item">
                            <strong>Sub Category</strong> : {{ $childcategory->parentSubcategory['subcategory_name'] }}
                        </li>
                        <li class="list-group-item">
                            <strong>Created</strong> : {{ $childcategory->created_at->diffForHumans() }}
                        </li>
                        <li class="list-group-item">
                            <strong>Updated</strong> : {{ $childcategory->updated_at->diffForHumans() }}
                        </li>
                    </ul>
                    <a href="{{url('childcategory/edit', $childcategory->id)}}" class="btn btn-primary"> Edit This Childcategory</a>
                </div>
            </div>
        </div>
    </div>
@endsection
