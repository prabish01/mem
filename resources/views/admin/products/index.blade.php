@extends('layouts.backend')
@section('admin-content')
    <div class="content-wrapper">
        <div class="box box-primary">
            @include('flashMsg.flashmessages')
            <div class="box-header">
                <h3>
                    Products
                </h3>
                <div class="pull-right">
                        <a href="{{url('admin-product/add')}}" class="btn btn-primary">Add Product</a>
                </div>
            </div>
            <div class="box-body table-responsive">
                <table class="table table-hover" id="myTable">
                    <thead>
                        <th>S.No</th>
                        <th>Product Name</th>
                        <th>Parent category</th>
                        <th>Parent Subcategory</th>
                        <th>Dealer Price</th>
                        <th>Consumer price</th>
                        <th>In Stock</th> 
                        <th>Featured</th>
                        <th>Enabled</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        <?php $i = 0;?>
                        @foreach($products  as $product)
                        <?php $i++; ?>
                        <tr>
                            <td>{{$i}}</td>
                            <td>{{$product->product_name}}</td>
                            <td>{{$product->parentCategory->category_name}}</td>
                            @if($product->subcategory_id)
                            <td>{{$product->parentSubCategory->subcategory_name}}</td>
                            @else
                            <td></td>
                            @endif
                            <td>{{$product->dealer_price}}</td>
                            <td>{{$product->retailer_price}}</td>
                            <td>{{$product->in_stock}}</td>
                              <td>
                                @if($product->featured == 1)
                                Featured <a href="{{url('admin-product/notfeatured', $product->id)}}" class="btn btn-danger btn-xs">UnFeatured This Product</a>
                            @else
                                Not Featured <a href="{{url('admin-product/featured', $product->id)}}" class="btn btn-success btn-xs"> Featured This Product</a>
                            @endif

                            </td>
                            <td>
                                @if($product->enabled == 1)
                                    Enabled <a href="{{url('admin-product/disable', $product->id)}}" class="btn btn-danger btn-xs">Disable</a>
                                @else
                                    Disabled <a href="{{url('admin-product/enable', $product->id)}}" class="btn btn-success btn-xs"> Enable</a>
                                @endif

                            </td>
                            <td>
                                <a href="{{url('admin-product/show', $product->id)}}" class="btn btn-info btn-sm" title="View  Details">
                                 <i class="fa fa-eye"></i>
                                </a>

                                <button type="button" class="btn btn-primary btn-sm" title=" Quick Edit Product Details" data-toggle="modal" data-target="#quickEdit-{{$product->id}}"><i class="fa fa-fighter-jet"></i>
                                </button>

                                <a href="{{url('admin-product/edit', $product->id)}}" class="btn btn-success btn-sm" title="Edit Product Details">
                                 <i class="fa fa-edit"></i>
                                </a>

                                <a href="{{url('admin-product/delete', $product->id)}}" class="btn btn-danger btn-sm" title="Delete Product "><i class=" fa fa-trash"></i></a>
                            </td>
                        </tr>
                        <!-- codes for quick edit of modal  -->
                        <div class="modal fade" id="quickEdit-{{$product->id}}" tabindex="1" role="dialog" aria-labelledby="QuickEditModal" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <h3 class="modal-title" id="#">Quick Edit Product Details</h3>
                                    </div>
                                    <div class="modal-body">
                                        <div>
                                            <p class="text-center">
                                                <h3>{{$product->product_name}}</h3>
                                            </p>
                                        </div>
                                        <div class="col-md-6">
                                            <img src="{{ asset('uploads/product/'.$product->image) }}" width="100%">
                                        </div>
                                        <div class="col-md-6">
                                           <form class="form-horizontal" method="post" action="{{url('admin-product/quickedit', $product->id)}}">
                                            @method('PUT')
                                            {{csrf_field()}}

                                            <div class="form-group">
                                                <label class="col-md-12 control-label">Price For Dealers:</label>
                                                <div class="col-md-12">
                                                 <input  class="form-control" type="text" name="dealer_price" value="{{$product->dealer_price}}" required>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-12 control-label">Price For Retailers:</label>
                                                <div class="col-md-12">
                                                 <input  class="form-control" type="text" name="retailer_price" value="{{$product->retailer_price}}" required>
                                                </div>
                                            </div>

                                         <div class="form-group">
                                            <label class="col-md-12 control-label">In Stock:</label>
                                            <div class="col-md-12">
                                             <input  class="form-control" type="text" name="in_stock" value="{{$product->in_stock}}" required>
                                            </div>
                                         </div>

                                         <div class="buttons">
                                            <button type="button" class="btn btn-danger modal-buttons col-md-offset-1" data-dismiss="modal" style=" margin-top: 10px;">Cancel</button>
                                            <button type="submit" class="btn btn-primary modal-buttons" style=" margin-top: 10px;">Save changes</button>
                                        </div>
                                       </form>
                                      </div>
                                    </div>
                                    <br>
                                    <div class="modal-footer">

                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                  </tbody>

                </table>
            </div>
        </div>
    </div>


@endsection
