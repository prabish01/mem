@foreach($products as $product)
<img src="{{ asset('uploads/product/' . $product->image) }}"
    alt="{{ $product->name }} - {{ $product->category->name }} {{ $product->brand ?? '' }}"
    class="product-image">
@endforeach