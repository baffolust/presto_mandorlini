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
        <x-info-article :article="$article"/>
    </div>

</x-layout>
