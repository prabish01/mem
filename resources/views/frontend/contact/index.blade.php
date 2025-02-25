@extends('layouts.frontend')
@section('content')
	<!-- Start Contact Area -->
    <div class="content-body">
        <section id="contactUs" class="section-padd">
            <div class="container">
                <h4>Contact Us</h4>
                <hr>
                <div class="row">
                    
                    <div class="col-md-12 mb-3">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3532.522907735412!2d85.28364771506196!3d27.701136882794525!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb1863b203faab%3A0xe212fc143266862b!2sBafal%20Marg%2C%20Kathmandu%2044600!5e0!3m2!1sen!2snp!4v1610538272436!5m2!1sen!2snp" width="100%" height="330" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                    </div>
                    <div class="col-md-6">
                        <div class="contact-detail-block">
                            <div class="contact-bar">
                                <div class="contact-icon">
                                    <i class="fa fa-phone"></i>
                                </div>
                                <div class="contact-txt">
                                    {{$info->phone}}
                                </div>
                            </div>
                            <div class="contact-bar">
                                <div class="contact-icon">
                                    <i class="fa fa-map-marker-alt"></i>
                                </div>
                                <div class="contact-txt">
                                    {{$info->address}}
                                </div>
                            </div>
                            <div class="contact-bar">
                                <div class="contact-icon">
                                    <i class="fa fa-map-marker-alt"></i>
                                </div>
                                <div class="contact-txt">
                                   Kolhapur Highway Opp. Bhat Bhateni, Nepalgunj
                                </div>
                            </div>
                            <div class="contact-bar">
                                <div class="contact-icon">
                                    <i class="fa fa-envelope"></i>
                                </div>
                                <div class="contact-txt">
                                    {{$info->email}}
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="contact-div">
                            <h5 class="mb-3">Please send us message for any kind of Queries</h5>
                            <form id="contactForm" action="{{url('frontend/sendmail')}}" method="post">
                                @csrf
                                <div class="form-label">Your Full Name</div>
                                <input type="text" name="sender_name" placeholder="Your Full Name" required>
                                <div class="form-label">Your Email</div>
                                <input type="email" name="sender_email" placeholder="Your Email" required>
                                <div class="form-label">Your Subject</div>
                                <input type="text" name="subject" placeholder="Subject" required>
                                <div class="form-label">Your Message</div>
                                <textarea rows="3" name="message" required></textarea>
                                <button type="submit" class="contact-form-btn">Send</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </section>
 
    </div>
        <!-- End Contact Area -->
@endsection
