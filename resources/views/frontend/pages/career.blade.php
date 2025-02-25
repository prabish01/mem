@extends('layouts.frontend')
@section('content')
    {{-- <div class="content-body">
        <section class="page-title-bar">
            <div class="container">
                <div class="page-breadcrumb">
                    <div class="page-title">Career</div>
                    <div class="breadcrumb-links">
                        <a href="{{route('landing')}}">Home</a><span class="breadcrumb-seperator">|</span>Career
                    </div>
                </div>
            </div>
        </section> --}}

        <section id="careerPage" class="section-padd">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h5>Job Vacancies</h5>
                        <hr>
                       <div class="vacancy-grid">
                            @foreach($jobs as $job)
                            <div class="vacancy-block">
                                {{$job->title}}
                            </div>
                             @endforeach
                        </div>
                    </div>
                    <div class="col-md-6">
                        {{-- @include('flashMsg.flashmessages') --}}
                        <form id="careerForm" action="{{route('vacancy')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <h6>Please fill up the form below to apply for Vacancy:</h6>
                            <div class="form-div">
                                <div class="form-labeling">Your Full Name:</div>
                                <input type="text" name="name" placeholder="Enter Full Name">
                            </div>
                            <div class="form-div">
                                <div class="form-labeling">Your Email Address:</div>
                                <input type="email" name="email" placeholder="ENter Email">
                            </div>
                            <div class="form-div">
                                <div class="form-labeling">Contact Number:</div>
                                <input type="number" name="phone" placeholder="Enter Phone Number">
                            </div>
                            <div class="form-div">
                                <div class="form-labeling">Vacancy you are applying for:</div>
                                <input type="text" name="vacancy" placeholder="Apply For">
                            </div>
                            <div class="form-div">
                                <div class="form-labeling">Upload your CV:</div>
                                <input type="file" name="cv">
                            </div>
                            <button class="form-btn" type="submit">Apply Now</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
