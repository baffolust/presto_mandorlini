<x-layout title="Home" :hide-masthead="true">

    {{-- HERO Section --}}
    <div class="hero-home text-center d-flex align-items-center mb-5">
        <section class="container">
            <div class="row justify-content-center">
                <div class="col-12 text-center my-5">
                    <h1 class="title_custom mb-3 text-custom-tertiary">Fast Mando</h1>
                    <p class="hero-subtitle mb-4 text-custom-tertiary">
                        {{ __('ui.Homepage_Subtitle') }}
                    </p>
                </div>
                @auth
                    <div class="col-12 col-md-6 d-flex justify-content-center">
                        <a class="btn btn-homepage-custom background-custom-highlight text-custom-secondary"
                            href="{{ route('article.create') }}">{{ __('ui.Publish_Article') }}</a>
                    </div>
                @endauth
            </div>
        </section>

    </div>


    {{-- Sezione Last 6 articles --}}
    <section class="container my-5">

        <div class="text-center mb-4 text-custom-secondary">
            <h2 class="fw-semibold">{{ __('ui.Homepage_Last_Articles') }}</h2>
            <p class="text-muted">{{ __('ui.Homepage_Last_Articles_Subtitle') }}</p>
        </div>

        <div class="row article-section-custom justify-content-center align-items-center">
            @forelse ($articles as $article)
                <div class="col-12 col-md-6 col-lg-4 mb-4">
                    <div class="article-wrapper-custom">
                        <x-card-article-home :article="$article" :category="$article->category" />
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <h3>{{ __('ui.No_Articles') }}</h3>
                </div>
            @endforelse
        </div>
    </section>
    </div>

</x-layout>
