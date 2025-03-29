<!-- Start Footer Area -->
<footer class="bg-cover bg-center" style="background-image: url('{{asset('assets/img/footerbg.png')}}');">
    <div class="container ml-24 mx-auto py-12">
        <div class="container mx-auto px-4 max-w-6xl">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 justify-center">
                <!-- Contact Us Section -->
                <div class=" md:text-left">
                    <h3 class="text-2xl font-extrabold tracking-wide uppercase mb-4">Contact Us</h3>
                    <div class="mb-3">+977-1-5184300, 5184301</div>
                    <div class="mb-3">Dhobighat, Kathmandu, Nepal</div>
                    <div class="mb-4">info@mem.com.np</div>
                    <a href="{{route('contact')}}" class="inline-block px-6 py-2 bg-yellow-500 text-white rounded hover:bg-yellow-600 transition-colors">Contact Us</a>
                </div>

                <!-- Quick Links Section -->
                <div class=" md:text-left">
                    <h3 class="text-2xl font-extrabold tracking-wide uppercase mb-4">Quick Links</h3>
                    <div class="space-y-2">
                        <div><a href="{{route('landing')}}" class="hover:text-yellow-500">Home</a></div>
                        <div><a href="{{route('about')}}" class="hover:text-yellow-500">About Us</a></div>
                        <div><a href="{{route('services')}}" class="hover:text-yellow-500">My Care</a></div>
                        <div><a href="{{route('blogs')}}" class="hover:text-yellow-500">Blog</a></div>
                        <div><a href="{{route('faq')}}" class="hover:text-yellow-500">FAQs</a></div>
                        <div><a href="{{route('allcatalogues')}}" class="hover:text-yellow-500">Catalogues</a></div>
                    </div>
                </div>

                <!-- Policy Section -->
                <div class=" md:text-left">
                    <h3 class="text-2xl font-extrabold tracking-wide uppercase mb-4">Policy</h3>
                    <div class="space-y-2">
                        <div><a href="{{route('payment')}}" class="hover:text-yellow-500">Payment Policy</a></div>
                        <div><a href="{{route('return')}}" class="hover:text-yellow-500">Return Policy</a></div>
                        <div><a href="{{route('privacy')}}" class="hover:text-yellow-500">Privacy Policy</a></div>
                        <div><a href="{{route('dealer')}}" class="hover:text-yellow-500">Dealer Policy</a></div>
                        <div><a href="{{route('deliveryinfo')}}" class="hover:text-yellow-500">Delivery Information</a></div>
                        <div><a href="{{route('terms')}}" class="hover:text-yellow-500">Terms & Conditions</a></div>
                    </div>
                </div>

                <!-- Follow Us Section -->
                <div class="md:text-left">
                    <h3 class="text-2xl font-extrabold tracking-wide uppercase mb-4">Follow Us</h3>
                    <div class="flex justify-center md:justify-start space-x-4 mb-6">
                        <a href="https://www.facebook.com/ManokamanaEarthMoversPvtLtd" target="_blank" class="hover:opacity-80">
                            <img src="{{asset('assets/img/facebook.png')}}" alt="Facebook" class="w-8 h-8">
                        </a>
                        <a href="" target="_blank" class="hover:opacity-80">
                            <img src="{{asset('assets/img/instagram.png')}}" alt="Instagram" class="w-8 h-8">
                        </a>
                        <a href="" target="_blank" class="hover:opacity-80">
                            <img src="{{asset('assets/img/youtube.png')}}" alt="YouTube" class="w-8 h-8">
                        </a>
                    </div>
                    <!-- <div class="flex justify-center md:justify-start">
                        <a href="" class="inline-block hover:opacity-80">
                            <img src="{{asset('assets/img/playstore.png')}}" alt="Google Play Store" class="w-36">
                        </a>
                    </div> -->
                </div>
            </div>
        </div>
    </div>

    <!-- Copyright Section -->
    <div class="bg-black py-4">
        <div class="container mx-auto flex gap-1 justify-center items-center">
            <p class="text-white text-sm">© 2025 <span class="text-yellow-500">Manokamana Earthmovers Pvt. Ltd.</span> All Rights Reserved.</p>
            <p class="text-white text-sm">Powered By <span class="text-yellow-500">Infinity Infosys</span></p>
        </div>
    </div>
</footer>
<!-- End Footer Style -->