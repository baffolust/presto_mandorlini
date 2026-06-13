<x-layout title="{{ $article->title }}" :hide-masthead="true">

    <div class="container article-show-wrapper mb-5">

        {{-- SWIPER IMMAGINI --}}
        <div class="article-media mb-5">
            @if ($article->images->count() > 0)
                <div class="swiper articleSwiper rounded-4 shadow mb-5 mb-md-0 ">
                    <div class="swiper-wrapper">
                        @foreach ($article->images as $key => $image)
                            <div class="swiper-slide position-relative">
                                <img src="{{ $image->getUrl(0, 0, $wm = true) }}" class="img-fluid shadow"
                                    alt="immagine dell'articolo {{ $article->title }}">
                                <span class="article-category-badge">
                                    {{ __('ui.' . $article->category->name) }}
                                </span>

                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="article-price-floating">
                    {{ $article->price }} €
                </div>
            @else
                <img src="{{ Storage::url('public/media/img/Image_not_available.png') }}" class="card-img-top"
                    alt="immagine dell'articolo {{ $article->title }}">

            @endif
        </div>

        {{-- INFORMAZIONI ARTICOLO --}}
        <div class="row justify-content-center">
            <div class="col-12 col-md-9">
                <div class="article-info-card background-custom-op rounded-4 p-4 shadow">
                    <h1 class="article-title mb-3">{{ $article->title }}</h1>
                    <div class="mb-3 text-custom-tertiary"><strong class="fw-bold">{{ __('ui.Category') }}: </strong>
                        {{ __('ui.' . $article->category->name) }}</div>
                    <div class="text-custom-tertiary"><span class="h5 fw-bold">{{ __('ui.Description') }}: </span>{{ $article->description }}</div>
                </div>
            </div>
        </div>
    </div>

</x-layout>
