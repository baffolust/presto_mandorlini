<x-layout title="Home">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 text-center my-5">
                <h1>Fast Mando</h1>
            </div>

            @auth
                <div class="col-12 col-md-6 d-flex justify-content-center h-100">
                    <a class="btn background-custom-highlight text-custom-secondary" href="{{ route('article.create') }}">Pubblica un Articolo</a>
                </div>
            @endauth
        </div>
    </div>

</x-layout>
