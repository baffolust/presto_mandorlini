<x-layout title="{{__('ui.All_Articles')}}" subtitle="{{ __('ui.Discover_all_articles') }}">

    <div class="container article-index-wrapper">

        {{--Card Articles Section --}}
        <section>

            <div class="row article-section-custom justify-content-center align-items-stretch">
                @forelse ($articles as $article)
                    <div class="col-12 col-md-4">
                        <div class="article-wrapper-custom">
                            <x-card-article-home :article="$article" :category="$article->category" />
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <h4 class="text-muted">{{__("ui.No_Articles")}}</h4>
                    </div>
                @endforelse
            </div>
            <div class="d-flex justify-content-center mt-5">
                <div>
                    {{$articles->links('pagination::bootstrap-5')}}
                </div>
            </div>
        </section>
    </div>

</x-layout>
