@cache('home-page-content', 3600)
<div class="featured-products">
    @foreach($featuredProducts->take(6) as $product)
    <x-product-card :product="$product" />
    @endforeach
</div>
@endcache