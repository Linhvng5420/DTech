<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('products') }}">All</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('phones') }}">Phone</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('laptops') }}">Laptop</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('desktops') }}">Desktop</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('mice') }}">Mouse</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('earphones') }}">EarPhone</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('screens') }}">Screen</a>
            </li>

            <!--Tìm Kiếm-->
            <li class="nav-item">
                <form class="form-inline" action="{{ route('search.products') }}" method="GET">
                    <input class="form-control mr-sm-2 ml-5" type="search" placeholder="Search" aria-label="Search"
                           name="query">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Tìm kiếm</button>
                </form>
            </li>
        </ul>
    </div>
</nav>
