<!-- Newslettersection    -->
<section id="newsletterSection" class="section-padd">
    <div class="container"> 
        <div class="row">
            <div class="col-md-6">
                <div class="section-title">
                    <span class="title-black">Subscribe</span>
                    <span class="title-yellow">Newsletter</span>
                </div>
            </div>
            <div class="col-md-6">
                <form id="subscribeForm" action="{{route('subscribe')}}" method="post">
                    @csrf
                    <div class="subscribe-block">
                        <input type="text" name="email" placeholder="Enter Email Address">
                        <button class="subscribe" type="submit">Subscribe Now</button> 
                </form>  
            </div>
                
        </div>
    </div> 
    {{-- <img class="dozer-bg" src="{{asset('assets/img/logomem.png')}}"> --}}
</section>