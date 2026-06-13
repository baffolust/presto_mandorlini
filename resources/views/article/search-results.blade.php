<x-layout title="Risultati della ricerca {{$query}}">

    <div class="container">

        {{--Card Articles Section --}}
        <section>

            <div class="row article-section-custom justify-content-center align-items-center">
                @forelse ($results as $result)
                    <div class="col-12 col-md-4">
                        <div class="article-wrapper-custom">
                            <x-card-article-home :article="$result" :category="$result->category" />
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <h3>{{__("ui.No_Articles")}}</h3>
                    </div>
                @endforelse
            </div>
            <div class="d-flex justify-content-center mt-4">
                <div>
                    {{$results->links('pagination::bootstrap-5')}}
                </div>
            </div>
        </section>
    </div>

</x-layout>
