@foreach($products as $product)
<div class="product-card">
    <img src="{{ asset('uploads/product/' . $product->image) }}"
        alt="{{ $product->image_alt }}"
        class="product-thumbnail"
        loading="lazy">
</div>
@endforeach

<img src="{{ asset('path/to/decorative/image.jpg') }}"
    alt=""
    class="decorative-element">

<style>
    .decorative-background {
        background-image: url('/path/to/image.jpg');
        background-size: cover;
        background-position: center;
    }
</style>