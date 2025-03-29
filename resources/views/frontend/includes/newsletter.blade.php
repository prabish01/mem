<!-- Newsletter section -->
<section id="newsletterSection" class="section-padd">
    <div class="container ml-24 mx-auto">
        <div class="container mx-auto px-4 max-w-6xl">
            <div class="row">
                <div class="col-md-6">
                    <div class="section-title">
                        <span class="title-black">Subscribe</span>
                        <span class="title-yellow">Newsletter</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <form id="subscribeForm" action="{{route('subscribe')}}" method="post" class="w-full">
                        @csrf
                        <div class="subscribe flex w-[450px] justify-between">
                            <input type="text" name="email" placeholder="Enter Email Address" class="w-[10%]">
                            <button class="subscribe w-[45%]" type="submit">Subscribe Now</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- <img class="dozer-bg" src="{{asset('assets/img/logomem.png')}}"> --}}
</section>