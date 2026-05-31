<x-layout title="">

    <div class="container mb-5">

        @if ($article->images->count() > 0)

            <div class="swiper articleSwiper mb-5 mb-md-0 ">
                <div class="swiper-wrapper">
                    @foreach ($article->images as $key => $image)
                        <div class="swiper-slide">
                            <img src="{{ $image->getUrl(300, 300) }}" class="img-fluid shadow img-revisor"
                                alt="immagine dell'articolo {{ $article->title }}">
                        </div>
                    @endforeach
                </div>
            </div>
        @else
            <img src="{{ Storage::url('public/media/img/Image_not_available.png') }}" class="card-img-top" alt="immagine dell'articolo {{ $article->title }}">

        @endif
        <div class="row justify-content-center">
            <div class="col-12 col-md-9">
                <h1 class="display-4"><span class=" fw-bold">{{ __('ui.Title') }}: </span> {{ $article->title }}</h1>
                <h3 class="display-6"><span class=" fw-bold">{{ __('ui.Category') }}: </span>
                    {{ __('ui.' . $article->category->name) }}</h3>
                <h4><span class=" fw-bold">{{ __('ui.Description') }}: </span>{{ $article->description }}</h4>

            </div>
        </div>
    </div>

</x-layout>
