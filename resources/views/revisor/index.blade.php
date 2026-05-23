<x-layout title="Dashboard dei revisori">

    <x-display-session-message />

    {{-- @dd($article_to_check) --}}
    @if ($article_to_check)
        <div class="row justify-content-center pt-5">
            <div class="col-12 col-md-8">
                <div class="row justify-content-center">

                    @for ($i = 0; $i < 6; $i++)
                        <div class="col-6 col-md-4 text-center p-3">
                            <img src="https://picsum.photos/400" class="card-img-top"
                                alt="immagine dell'articolo {{ $article_to_check->title }}">
                        </div>
                    @endfor
                </div>
            </div>
        </div>
        <div class="row justify-content-center py-5 m-3">
            <div class="col-12 col-md-7 ps-4 d-flex flex-column justify-content-between mb-3">
                <h1>{{ $article_to_check->title }}</h1>
                <h3>Autore: {{ $article_to_check->user->name }}</h3>
                <h4>Prezzo: {{ $article_to_check->price }} €</h4>
                <h4>Categoria: {{ $article_to_check->category->name }}</h4>
                <p class="h6">{{ $article_to_check->description }}</p>
            </div>
            <div class="d-flex pb-4 justify-content-center">
                <form class="mx-2" action="{{ route('revisor.article.accept', ['article' => $article_to_check]) }}"
                    method="POST">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="btn btn-success">Accetta</button>
                </form>
                <form class="mx-2" action="{{ route('revisor.article.reject', ['article' => $article_to_check]) }}"
                    method="POST">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="btn btn-danger">Rifiuta</button>
                </form>
            </div>
        </div>
    @else
        <div class="row justify-content-center align-items-center text-center">
            <div class="col-12">
                <h1>
                    Nessun articolo da revisionare
                </h1>
                <a href="{{ route('homepage') }}" class="btn btn-primary">Torna all'homepage</a>
            </div>
        </div>
    @endif
</x-layout>
