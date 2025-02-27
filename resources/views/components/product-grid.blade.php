<div class="products-grid">
    @foreach($products as $product)
    <div class="product-card">
        <div class="product-image-wrapper">
            <img src="{{ asset('uploads/product/' . $product->image) }}"
                alt="{{ $product->name }}"
                class="w-full h-full object-contain"
                loading="lazy">
        </div>
        <h3 class="text-lg font-semibold text-gray-800 mb-2">{{ $product->name }}</h3>
        @if($product->is_new)
        <span class="bg-yellow-400 text-sm px-2 py-1 rounded absolute top-2 right-2">
            New
        </span>
        @endif
    </div>
    @endforeach
</div>