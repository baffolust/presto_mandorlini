<nav class="navbar navbar-expand-lg background-custom-tertiary text-custom-secondary shadow">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="{{ asset('storage/media/img/logo.png') }}" alt="Logo" width="40" height="40">
        </a>
        <form class="d-flex position-absolute start-50 form-search-custom translate-middle-x" role="search" action="{{route('article.search')}}" method="GET">
            <input class="form-control me-2" type="search" placeholder="Search" name="query">
            <button class="btn background-custom-tertiary btn-search-custom"
                type="submit"><strong>Search</strong></button>
        </form>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            {{-- LEFT SIDE --}}
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('homepage') }}">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Sezione Articoli
                    </a>
                    <ul class="dropdown-menu">
                        @auth
                            <li><a class="dropdown-item" href="{{ route('article.create') }}">Inserisci Articolo</a></li>
                        @endauth
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Categories
                    </a>
                    <ul class="dropdown-menu">
                        @foreach ($categories as $category)
                            <li><a class="dropdown-item"
                                    href="{{ route('article.byCategory', compact('category')) }}">{{ $category->name }}</a>
                            </li>
                            @if (!$loop->last)
                                <hr class="dropdown-divider">
                            @endif
                        @endforeach
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{ route('article.index') }}">Tutti gli Articoli</a>
                </li>

                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Sezione Revisori

                        </a>
                        <ul class="dropdown-menu pe-4">
                            @if (Auth::user()->is_revisor)
                                <li>
                                    <a class="dropdown-item position-relative" href="{{ route('revisor.index') }}">
                                        Dashboard Revisori
                                        <span
                                            class="position-absolute position-badge-custom translate-middle badge rounded-pill bg-danger">
                                            {{ \App\Models\Article::toBeRevisedCount() }}
                                            <span class="visually-hidden">articles to be revised</span>
                                        </span>
                                    </a>
                                </li>
                            @endif

                            @if (!Auth::user()->is_revisor)
                                <li>
                                    <a class="dropdown-item" href="{{ route('revisor.become-revisor') }}">Diventa un
                                        revisore</a>
                                </li>
                            @endif
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                @endauth

            </ul>



            {{-- RIGHT SIDE --}}
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 me-3">
                @guest
                    <li class="nav-item me-md-1">
                        <a class="btn background-custom-primary text-custom-secondary" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Registrati</a>
                    </li>
                @endguest
                @auth
                    <li class="nav-link m-0 me-md-3" href="#">Benvenuto
                        <strong><em>{{ Auth::user()->name }}</em></strong>
                    </li>
                    <li>
                        <form class="me-1 my-2 my-md-0" action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button class="btn background-custom-secondary text-custom-primary"
                                type="submit">Logout</button>
                        </form>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
