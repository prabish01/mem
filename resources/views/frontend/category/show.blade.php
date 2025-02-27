@foreach($categories as $category)
<div class="category-card">
    <img src="{{ asset('uploads/product/' . $category->image) }}"
        alt="{{ $category->name }} - Auto Parts Category"
        class="category-image"
        loading="lazy">
</div>
@endforeach