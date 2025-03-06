@extends('layouts.backend')
@section('admin-content')
<div class="content-wrapper">
    <div class="box box-primary">
        @include('flashMsg.flashmessages')
        <div class="box-header">
            <h3>Edit Product</h3>
        </div>
        <div class="box-body">
            <form class="form-horizontal" method="post" action="{{url('admin-product/update', $product->id)}}"
                enctype="multipart/form-data">
                @method('PUT')
                {{csrf_field()}}

                <div class="bg-info" style="padding-top: 0.5rem; padding-bottom: 0.5rem;">

                    <h2 class="text-center "><strong>SEO</strong></h2>


                    <div class="form-group">
                        <label class="col-md-4 control-label">Meta Title</label>
                        <div class="col-md-6">
                            <input class="form-control" type="text" name="meta_title" value="{{$product->meta_title}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Meta Description</label>
                        <div class="col-md-6">
                            <input class="form-control" type="text" name="meta_description"
                                value="{{$product->meta_description}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Meta Keywords</label>
                        <div class="col-md-6">
                            <input class="form-control" type="text" name="meta_keywords"
                                value="{{$product->meta_keywords}}">
                            <p class="help-block">Comma separated</p>
                        </div>
                    </div>

                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Select Category:</label>
                    <div class="col-md-6">
                        <select name="category_id" class="form-control" id="category">
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}" @if ($category->id == $product->category_id)
                                selected='selected' @endif>
                                {{ $category->category_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Select Sub-Category:</label>
                    <div class="col-md-6" id="subcategory">
                        <select name="subcategory_id" class="form-control" id="freesubcategory">
                            @foreach ($subCategories as $Subcategory)
                            <option value="{{ $Subcategory->id }}" @if ($Subcategory->id == $product->subcategory_id)
                                selected='selected' @endif>
                                {{ $Subcategory->subcategory_name }}</option>
                            @endforeach

                            @if ($product->subcategory_id == null)
                            <option value="" selected="selected">No Subcategory Found
                            </option>
                            @endif

                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Select Child-Category:</label>
                    <div class="col-md-6" id="childcategory">
                        <select name="childcategory_id" class="form-control" id="freechildcategory">

                            @foreach ($childCategories as $childCategory)
                            <option value="{{ $childCategory->id }}" @if ($childCategory->id ==
                                $product->childcategory_id) selected='selected' @endif>
                                {{ $childCategory->childcategory_name }}
                            </option>
                            @endforeach
                            @if ($product->childcategory_id == null)
                            <option value="" selected="selected">No ChildCategory Found
                            </option>
                            @endif
                            </option>

                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Product Name:</label>
                    <div class="col-md-6">
                        <input class="form-control" type="text" name="product_name" value="{{$product->product_name}}"
                            required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Description:</label>
                    <div class="col-md-6">
                        <textarea rows="8" class="form-control" type="text" name="description" id="description"
                            required>{{$product->description}}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label">Mark Price(MRP):</label>
                    <div class="col-md-6">
                        <input class="form-control" type="number" name="mrp" value="{{ $product->mrp }}" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label">Price For Dealers:</label>
                    <div class="col-md-6">
                        <input class="form-control" type="text" name="dealer_price" value="{{$product->dealer_price}}"
                            required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Price For Consumers:</label>
                    <div class="col-md-6">
                        <input class="form-control" type="text" name="retailer_price"
                            value="{{$product->retailer_price}}" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Discount Price(%):</label>
                    <div class="col-md-6">
                        <input class="form-control" type="number" name="discount_price"
                            value="{{$product->discount_price}}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">In Stock:</label>
                    <div class="col-md-6">
                        <input class="form-control" type="text" name="in_stock" value="{{$product->in_stock}}" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Available Colors:</label>
                    <div class="col-md-6">
                        <input class="form-control" type="text" name="available_colors"
                            value="{{$product->available_colors}}" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Available Sizes:</label>
                    <div class="col-md-6">
                        <input class="form-control" type="text" name="available_sizes"
                            value="{{$product->available_sizes}}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Product Image:</label>
                    <div class="col-md-3">
                        <input class="form-control" type="file" name="image">
                    </div>
                    @if(isset($product))
                    <div class="col-md-4">
                        <img src="{{asset('uploads/product'.'/'.$product->image)}}" alt="" width="100px;">
                    </div>
                    @endif
                </div>

                <div class="col-md-offset-4">
                    <button class="btn btn-primary">Update</button>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection
@section('js')
<script>
    $(document).ready(function() {
            // $("#subcategory").find("*").prop("disabled", true);
            // $('#freesubcategory').prepend('<option disabled="disabled" selected="selected">No Subcategory Found</option>');
            $('#category').on('change', function () {
                var id = $(this).val();
                $('#freesubcategory').empty();
                $.get("{{url('subcategory/allsubcategory')}}" + "/" + id, function (data) {
                    //console.log(data.result);
                    if (data.result.length > 0) {
                        $("#subcategory").find("*").prop("disabled", false);
                        $('#freesubcategory').prepend('<option disabled="disabled" selected="selected">Please Select Subcategory</option>');
                        $.each(data.result, function (key, value) {
                            $('#freesubcategory').append($('<option>', {
                                value: value.id,
                                text: value.subcategory_name,
                            }));
                        });
                    } else {
                        $('#freesubcategory').prepend('<option disabled="disabled" selected="selected">No Subcategory Found</option>');
                        $("#subcategory").find("*").prop("disabled", true);
                    }
                });
            });
            $('#freesubcategory').on('change', function () {
                var id = $(this).val();
                $('#freechildcategory').empty();
                $.get("{{url('childcategory/allchildcategory')}}" + "/" + id, function (data) {
                    //console.log(data.result);
                    if (data.result.length > 0) {
                        $("#childcategory").find("*").prop("disabled", false);
                        $('#freechildcategory').prepend('<option disabled="disabled" selected="selected">Please Select Childcategory</option>');
                        $.each(data.result, function (key, value) {
                            $('#freechildcategory').append($('<option>', {
                                value: value.id,
                                text: value.childcategory_name,
                            }));
                        });
                    } else {
                        $('#freechildcategory').prepend('<option disabled="disabled" selected="selected">No Childcategory Found</option>');
                        $("#childcategory").find("*").prop("disabled", true);
                    }
                });
            });
        });
</script>
@endsection