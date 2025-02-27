<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-6 text-gray-800">Our Blog</h1>
    @foreach($blogs as $blog)
    <img src="{{ asset('uploads/blog/' . $blog->image) }}"
        alt="{{ $blog->title }} - {{ $blog->excerpt }}"
        class="blog-image">
    @endforeach
    // ... rest of the content ...
</div>