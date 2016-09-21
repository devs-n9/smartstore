<div class="sidebar-widget">
    <h3>Categories</h3>
    <ul class="list-unstyled">
        @foreach($categories as $category)
        <li><a href="/category/{{ $category->alias }}">{{ $category->category }}</a></li>
        @endforeach
    </ul>
</div><!--sidebar-widget end-->