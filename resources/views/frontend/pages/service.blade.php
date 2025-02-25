@extends('layouts.frontend')
@section('content')
    <div class="content-body">

        <section id="servicePage" class="section-padd">
            <div class="container">
                <form id="serviceForm" method="post" action="{{route('complain')}}" enctype="multipart/form-data">
                    @csrf
                    <h5 class="mb-4">Fill in the form to register your complaint and our representatives will get in touch with you at the earliest.</h5>
                    <div class="row">
                        <div class="col-xs-12 col-sm-4 col-md-3">
                            <div class="form-labeling">Name*</div>
                            <input type="text" name="name" placeholder="Enter Name" required>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-3">
                            <div class="form-labeling">Email ID*</div>
                            <input type="email" name="email" placeholder="Enter Email" required>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-3">
                            <div class="form-labeling">Mobile Number*</div>
                            <input type="text" name="phone" placeholder="Enter Phone No" required>
                        </div>

                        <div class="col-xs-12 col-sm-4 col-md-3">
                            <div class="form-labeling">State*</div>
							<select name="state" required>
								<option selected disabled>--Select State/Province--</option>
								<option value="Province 1">Province 1</option>
								<option value="Province 2">Province 2</option>
								<option value="Province 3">Province 3</option>
								<option value="Province 4">Province 4</option>
								<option value="Province 5">Province 5</option>
								<option value="Province 6">Province 6</option>
								<option value="Province 7">Province 7</option>
							</select>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-3">
                            <div class="form-labeling">City*</div>
                            <input type="text" name="city" placeholder="Enter City" required>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-3">
                            <div class="form-labeling">Address*</div>
                            <input type="text" name="address" placeholder="Enter Address" required>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-3">
                            <div class="form-labeling">Street*</div>
                            <input type="text" name="street" placeholder="Enter Street" required>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-3">
                            <div class="form-labeling">Landmark</div>
                            <input type="text" name="landmark" placeholder="Provide Landmark">
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-3">
                            @php
                                $category = DB::table('categories')->select('*')->orderBy('category_name','asc')->get();
                            @endphp
                            <div class="form-labeling">Select Category</div>
                            <select name="category" required>
                                <option selected disabled>Select Category</option>
                                @foreach($category as $cat)
                                    <option value="{{$cat->category_name}}">{{$cat->category_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-3">
                            <div class="form-labeling">Product Name*</div>
                            <input type="text" name="product" placeholder="Enter Product Name" required>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-3">
                            <div class="form-labeling">Product Serial No.</div>
                            <input type="text" name="productserial" placeholder="Serial No." required>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-3">
                            <div class="form-labeling">Purchase Date*</div>
                            <input type="date" name="purchase_date" required>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-3">
                            <div class="form-labeling">Select Complaint Symptom*</div>
                            <select name="complaint">
								<option selected disabled>--Select Complaint Symptom--</option>
                                <option value="Product Not Working">Product Not Working</option>
                                <option value="Battery Problem">Battery Problem</option>
                                <option value="Inverter Problem">Inverter Problem</option>
                                <option value="Regular Checkup">Regular Checkup</option>
                            </select>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-3">
                            <div class="form-labeling">Warrenty Card</div>
                            <input type="file" name="warrenty">
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-3">
                            <div class="form-labeling">Billing Card</div>
                            <input type="file" name="billing">
                        </div>

                        <div class="col-xs-12 col-sm-4 col-md-3">
                            <div class="form-labeling">Remark</div>
                            <input type="text" name="remark" placeholder="Remark">
                        </div>
                    </div>
                    <div class="text-center mt-4 mb-5">
                        <button class="form-btn btn-primary" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </section>

    </div>
@endsection
