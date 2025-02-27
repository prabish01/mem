<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-6 text-gray-800">{{ $blog->title }}</h1>
    <img src="{{ asset('uploads/blog/' . $blog->image) }}"
        alt="{{ $blog->title }}"
        class="blog-image">
    // ... rest of the content ...
</div>