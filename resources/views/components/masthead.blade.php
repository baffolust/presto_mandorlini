<header class="masthead">
    <div class="container h-100">
        <div class="row h-100 pt-5 align-items-center">
            <div class="col-12 text-center">
                <h1 class="display-5 fw-bold mb-2">{{ $title }}</h1>
                @isset($subtitle)
                    <p class="text-muted fs-5">{{ $subtitle }}</p>
                @endisset
            </div>
        </div>
    </div>
</header>
