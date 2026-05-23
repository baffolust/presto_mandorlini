<x-layout title="Home">

    

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 text-center my-5">
                <h1>Fast Mando</h1>
            </div>

            @auth
                <div class="col-12 col-md-6 d-flex justify-content-center">
                    <a class="btn btn-homepage-custom background-custom-highlight text-custom-secondary"
                        href="{{ route('article.create') }}">Pubblica un Articolo</a>
                </div>
            @endauth

        </div>

        {{-- Sezione Last 6 articles --}}
        <section>

            <div class="row article-section-custom justify-content-center align-items-center">
                @forelse ($articles as $article)
                    <div class="col-12 col-md-4">
                        <x-card-article-home :article="$article" :category="$article->category"/>
                    </div>
                @empty
                    <div class="col-12">
                        <h3>Nessun articolo inserito</h3>
                    </div>
                @endforelse
            </div>
        </section>
    </div>

</x-layout>
