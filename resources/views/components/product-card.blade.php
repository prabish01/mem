@props(['product'])

<div class="product-card">
    <div class="product-image-wrapper h-48">
        <img src="{{ asset('uploads/product/' . $product->image) }}"
            alt="{{ $product->name }}"
            loading="lazy">
    </div>
    <h3>{{ $product->name }}</h3>
    @if($product->is_new)
    <span class="badge-new">New</span>
    @endif
</div>