<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="collapse navbar-collapse justify-content-center">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('home') }}">All</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('products.phones') }}">Phone</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('products.laptops') }}">Laptop</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('products.desktops') }}">Desktop</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('products.mice') }}">Mouse</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('products.earphones') }}">EarPhone</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('products.screens') }}">Screen</a>
            </li>

            <!--Tìm Kiếm-->
            <li class="nav-item">
                <form action="{{ route('search.products') }}" method="GET">
                    <input class="form-control mr-sm-2 ml-5" type="search" placeholder="Tìm Kiếm..." aria-label="Search"
                           name="query">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Tìm kiếm</button>
                </form>
            </li>
        </ul>
    </div>
</nav>
