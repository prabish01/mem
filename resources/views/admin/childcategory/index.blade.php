@extends('layouts.backend')
@section('admin-content')
    <div class="content-wrapper">
        <div class="box box-primary">
            @include('flashMsg.flashmessages')
            <div class="box-header">
                <h3>
                    ChildCategory
                </h3>
                <div class="pull-right">
                    <a href="{{url('childcategory/add')}}" class="btn btn-primary">Add Childcategory</a>
                </div>
            </div>
            <div class="box-body table-responsive">
                <table class="table table-hover" id="myTable">
                    <thead>
                    <th>S.No</th>
                    <th>Parent category</th>
                    <th>Parent Subcategory</th>
                    <th>Childcategory Name</th>
                    <th>Action</th>
                    </thead>
                    <tbody>
                    <?php $i = 0;?>
                    @foreach($childcategorys  as $childcategory)
                        <?php $i++; ?>
                        <tr>
                            <td>{{$i}}</td>
                            <td>{{$childcategory->parentCategory['category_name']}}</td>
                            <td>{{$childcategory->parentSubcategory['subcategory_name']}}</td>
                            <td>{{$childcategory->childcategory_name}}</td>
                            <td>
                                <a href="{{url('childcategory/show', $childcategory->id)}}" class="btn btn-info btn-sm" title="View  Details">
                                    <i class="fa fa-eye"></i>
                                </a>

                                <a href="{{url('childcategory/edit', $childcategory->id)}}" class="btn btn-success btn-sm" title="Edit Product Details">
                                    <i class="fa fa-edit"></i>
                                </a>

                                <a href="{{url('childcategory/delete', $childcategory->id)}}" class="btn btn-danger btn-sm" title="Delete Product "><i class=" fa fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>
@endsection
