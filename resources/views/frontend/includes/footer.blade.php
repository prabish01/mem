<!-- Start Footer Area -->
    <footer style="background-image: url('{{asset('assets/img/footerbg.png')}}');">
        <div id="preFooter">
            <div class="container">
                <div class="row">
                    @php
                        $info = DB::table('infos')->select('*')->first();
                    @endphp
                    @if(!empty($info))
                    <div class="col-md-3 order-sm-1 order-4 first">
                         <div class="footer-title">Contact Us</div>
                        <div class="footer-bar"></div>
                    
                        <div class="footer-li">
                            {{$info->phone}}
                        </div>
                        <div class="footer-li">
                            {{$info->address}}
                        </div>
                        <div class="footer-li">
                            {{$info->email}}
                        </div>
                         <a href="{{route('contact')}}" class="contact-us-btn">Contact Us</a>
                    </div>
                    @endif
                    <div class="col-md-3 order-1 second">
                        <div class="footer-title">Quick Links</div>
                        <div class="footer-bar"></div>
                        <div class="footer-li"><a href="{{route('landing')}}">Home</a></div>
                        <div class="footer-li"><a href="{{route('about')}}">About Us</a></div>
                        <div class="footer-li"><a href="{{route('services')}}">My Care</a></div>
                        <div class="footer-li"><a href="{{route('blogs')}}">Blog</a></div>
                        <div class="footer-li"><a href="{{route('faq')}}">FAQs</a></div>
                        <div class="footer-li"><a href="{{route('allcatalogues')}}"  >Catalogues</a></div> 
                        
                    </div>
                    <div class="col-md-3 order-2 second">
                        <div class="footer-title">Policy</div>
                   
                    <div class="footer-li"><a href="{{route('payment')}}">Payment Policy</a></div>
                    <div class="footer-li"><a href="{{route('return')}}">Return Policy</a></div>
                    <div class="footer-li"><a href="{{route('privacy')}}">Privacy Policy</a></div>
                    <div class="footer-li"><a href="{{route('dealer')}}">Dealer Policy</a></div>
                    <div class="footer-li"><a href="{{route('deliveryinfo')}}">Delivery Information</a></div>
                    <div class="footer-li"><a href="{{route('terms')}}">Terms & Conditions</a></div>
                    </div>
                    <div class="col-md-3 order-3 third">
                        <div class="footer-title">Follow Us</div>
                        <div class="footer-social">
                            <a href="https://www.facebook.com/ManokamanaEarthMoversPvtLtd" target="_blank">
                                <img src="{{asset('assets/img/facebook.png')}}">
                            </a>
                            <a href="" target="_blank">
                                <img src="{{asset('assets/img/instagram.png')}}">
                            </a>
                             <a href="" target="_blank">
                                <img src="{{asset('assets/img/youtube.png')}}">
                            </a>
                        </div>
                         <div class="mt-3">
                        <a href="">
                            <img class="app-img" src="{{asset('assets/img/playstore.png')}}" width="150px;">
                        </a>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright">
            <div class="container">
                © {{date('Y')}} Manokamana Earthmovers. All Rights Reserved.
                Powered by <a href="https://www.facebook.com/AnkkurGoyalOfficial" target="_blank">
                    <img class="ankur-img" src="{{asset('assets/img/ankurlogo.png')}}" />
                </a>
            </div>
        </div>
    </footer>
<!-- End Footer Style -->
