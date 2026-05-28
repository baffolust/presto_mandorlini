<nav class="navbar navbar-expand-lg background-custom-tertiary text-custom-secondary shadow">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="{{ asset('storage/media/img/logo.png') }}" alt="Logo" width="40" height="40">
        </a>
        <form class="d-flex position-absolute start-50 form-search-custom translate-middle-x" role="search" action="{{route('article.search')}}" method="GET">
            <input class="form-control me-2" type="search" placeholder="Search" name="query">
            <button class="btn background-custom-tertiary btn-search-custom"
                type="submit"><strong>{{__("ui.Search")}}</strong></button>
        </form>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            {{-- LEFT SIDE --}}
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('homepage') }}">{{__("ui.Home")}}</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        {{__("ui.Article_Section")}}
                    </a>
                    <ul class="dropdown-menu">
                        @auth
                            <li><a class="dropdown-item" href="{{ route('article.create') }}">{{__("ui.Insert_Article")}}</a></li>
                        @endauth
                        <li><a class="dropdown-item" href="#">{{__("ui.Another_Action")}}</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">{{__("ui.Something_Else")}}</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        {{__("ui.Categories")}}
                    </a>
                    <ul class="dropdown-menu">
                        @foreach ($categories as $category)
                            <li><a class="dropdown-item"
                                    href="{{ route('article.byCategory', compact('category')) }}">{{__("ui.$category->name") }}</a>
                            </li>
                            @if (!$loop->last)
                                <hr class="dropdown-divider">
                            @endif
                        @endforeach
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{ route('article.index') }}">{{__("ui.All_Articles")}}</a>
                </li>

                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            {{__("ui.Revisor_Section")}}

                        </a>
                        <ul class="dropdown-menu pe-4">
                            @if (Auth::user()->is_revisor)
                                <li>
                                    <a class="dropdown-item position-relative" href="{{ route('revisor.index') }}">
                                        {{__("ui.Revisor_Dashboard")}}
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
                                    <a class="dropdown-item" href="{{ route('revisor.become-revisor') }}">{{__("ui.Become_Revisor")}}</a>
                                </li>
                            @endif
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">{{__("ui.Something_Else")}}</a></li>
                        </ul>
                    </li>
                @endauth

            </ul>



            {{-- RIGHT SIDE --}}
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 me-3">
                <li class="nav-item me-md-1">
                    <x-_locale lang="uk"/>
                    <x-_locale lang="es"/>
                    <x-_locale lang="it"/>
                </li>
                @guest
                    <li class="nav-item me-md-1">
                        <a class="btn background-custom-primary text-custom-secondary" href="{{ route('login') }}">{{__("ui.Login")}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{__("ui.Register")}}</a>
                    </li>
                @endguest
                @auth
                    <li class="nav-link m-0 me-md-3" href="#">{{__("ui.Welcome")}}
                        <strong><em>{{ Auth::user()->name }}</em></strong>
                    </li>
                    <li>
                        <form class="me-1 my-2 my-md-0" action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button class="btn background-custom-secondary text-custom-primary"
                                type="submit">{{__("ui.Logout")}}</button>
                        </form>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
