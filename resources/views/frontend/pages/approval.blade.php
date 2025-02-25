@extends('layouts.frontend')
@section('content')
    <div class="content-body">
        <section id="aboutUs" class="section-padd">
            <div class="container" style="">
                <div class="row">
                    <div class="col-sm-6 mx-auto">
                        <h1 class="text-danger center">Access Denied</h1>
                        <hr>
                        <img class="img-thumbnail center-block" src="images/others/access-denied.jpg" style="max-width: 400px;">
                        <br><p class="text-justify m-2" style="text-align: center; color:red; font-weight:bold;">
                            Your account is not activated as dealer.
                            Please contact the admin of Manokamana Earthmovers to activate your account.
                            Sorry For the inconvenience.
                        </p>  
                        <div class="subscribe-block">
                            <a class="btn-lg btn-danger" href="{{ url('/') }}">Home</a>
                        </div>

                    </div>
                    <!-- Column content -->
                </div>
            </div>
        </section>
 
    </div>
@endsection
