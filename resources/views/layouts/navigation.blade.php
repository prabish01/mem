<nav class="bg-yellow-400">
    <div class="container mx-auto">
        <ul class="nav-list">
            @foreach($mainCategories as $category)
            <li class="nav-item">
                <a href="{{ route('category', $category->slug) }}">
                    {{ $category->name }}
                </a>
                @if($category->subcategories->count())
                <ul class="submenu">
                    @foreach($category->subcategories->take(5) as $sub)
                    <li><a href="{{ route('subcategory', $sub->slug) }}">
                            {{ $sub->name }}
                        </a></li>
                    @endforeach
                </ul>
                @endif
            </li>
            @endforeach
        </ul>
    </div>
</nav>