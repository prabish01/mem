@extends('layouts.frontend')

@section('content')
    <div class="content-body">
        <section id="aboutUs" class="section-padd">
            <div class="container">
                <h4>Register</h4>
                <hr>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="login-left" style="background-image: url('{{ asset('assets/img/s1.jpg') }}');">
                            <div class="z-1">
                                <h4 class="mb-3">Already have an account?</h4>
                                <p>
                                    Sign up now to have access to various features like ordering and buying various
                                    documents and books related to electronics and electrical devices.
                                </p>
                                <a href="{{ route('login') }}" class="login-btn">Login Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="login-right">
                            <h5 class="mb-5">Create Dealer Account</h5>
                            <form method="POST" id="loginForm" action="{{ url('registerdealer') }}"
                                aria-label="{{ __('Register') }}" enctype="multipart/form-data">
                                @csrf


                                <input id="name" type="text"
                                    class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name"
                                    value="{{ old('name') }}" placeholder="Enter Full Name" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif

                                <input id="email" type="email"
                                    class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                                    value="{{ old('email') }}" placeholder="Enter your Email Address" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif

                                <input id="password" type="password"
                                    class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                    name="password" placeholder="Enter your Password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif

                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" placeholder="Confirm your Password" required>

                                <input id="company_name" type="text"
                                    class="form-control{{ $errors->has('company_name') ? ' is-invalid' : '' }}"
                                    name="company_name" placeholder="Enter your Company/Organization" required>

                                @if ($errors->has('company_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('company_name') }}</strong>
                                    </span>
                                @endif

                                <input id="company_address" type="text"
                                    class="form-control{{ $errors->has('company_address') ? ' is-invalid' : '' }}"
                                    name="company_address" placeholder="Enter your Company Address" required>

                                @if ($errors->has('company_address'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('company_address') }}</strong>
                                    </span>
                                @endif

                                <input id="phone_number" type="text"
                                    class="form-control{{ $errors->has('phone_number') ? ' is-invalid' : '' }}"
                                    name="phone_number" placeholder="Enter your Mobile Number" required>

                                @if ($errors->has('phone_number'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone_number') }}</strong>
                                    </span>
                                @endif


                                <input id="landline_number" type="text"
                                    class="form-control{{ $errors->has('landline_number') ? ' is-invalid' : '' }}"
                                    name="landline_number" placeholder="Enter your LANDLINE Number">

                                @if ($errors->has('landline_number'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('landline_number') }}</strong>
                                    </span>
                                @endif

                                <input id="pan_number" type="number"
                                    class="form-control{{ $errors->has('pan_number') ? ' is-invalid' : '' }}"
                                    name="pan_number" placeholder="Enter your PAN Number">

                                @if ($errors->has('pan_number'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('pan_number') }}</strong>
                                    </span>
                                @endif
                                <div class="input-group">
                                    <div class="custom-file">

                                        <input id="userimages" type="file" class="custom-file-input"
                                            accept=".jpg,.jpeg,.png" name="userimages[]" multiple onchange="previewFiles()"
                                            required>
                                        <label class="custom-file-label" for="inputGroupFile01">Upload your PAN
                                            Documents</label>
                                    </div>
                                </div>

                                <p for="userimages" class="text-danger">
                                    {{ __('Note: Please provide your PAN Douments (*)') }}</p>

                                <div id="preview" height='150' width='150' style="margin-left: 5px;"></div>
                                @if ($errors->has('userimages'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('userimages') }}</strong>
                                    </span>
                                @endif
                                <input type="hidden" name="role_id" value="2"> 
                                <button type="submit" class="login-btn">Create Account</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

<script>
    function previewFiles() {

        var preview = document.querySelector('#preview');
        preview.innerHTML = "";
        var files = document.querySelector('#userimages').files;

        function readAndPreview(file) {

            // Make sure `file.name` matches our extensions criteria
            if (/\.(jpe?g|png|gif)$/i.test(file.name)) {
                var reader = new FileReader();

                reader.addEventListener("load", function() {
                    var image = new Image();
                    image.height = 150;
                    image.title = file.name;
                    image.src = this.result;
                    image.style = "margin:5px; border-radius: 15px;"
                    preview.appendChild(image);
                }, false);

                reader.readAsDataURL(file);
            }

        }

        if (files) {
            [].forEach.call(files, readAndPreview);
        }

    }

    function previewFile() {
        const preview = document.querySelector('img');
        const file = document.querySelector('input[type=file]').files[0];
        const reader = new FileReader();

        reader.addEventListener("load", function() {
            // convert image file to base64 string
            preview.src = reader.result;
        }, false);

        if (file) {
            reader.readAsDataURL(file);
            document.getElementById("mainimage").style.display = "block";

        }
    }
</script>
