<x-layout title="Tutti gli Articoli">

    <div class="container">

        {{--Card Articles Section --}}
        <section>

            <div class="row article-section-custom justify-content-center align-items-center">
                @forelse ($articles as $article)
                    <div class="col-12 col-md-4">
                        <x-card-article-home :article="$article" :category="$article->category" />
                    </div>
                @empty
                    <div class="col-12">
                        <h3>Nessun articolo inserito</h3>
                    </div>
                @endforelse
            </div>
            <div class="d-flex justify-content-center mt-4">
                <div>
                    {{$articles->links('pagination::bootstrap-5')}}
                </div>
            </div>
        </section>
    </div>

</x-layout>
