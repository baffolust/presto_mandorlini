<x-layout title="">

    <div class="swiper articleSwiper">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <img src="https://picsum.photos/400" class="card-img-top"
                    alt="immagine dell'articolo {{ $article->title }}">
            </div>
            <div class="swiper-slide">
                <img src="https://picsum.photos/401" class="card-img-top"
                    alt="immagine dell'articolo {{ $article->title }}">
            </div>
            <div class="swiper-slide">
                <img src="https://picsum.photos/402" class="card-img-top"
                    alt="immagine dell'articolo {{ $article->title }}">
            </div>
            <div class="swiper-slide">
                <img src="https://picsum.photos/403" class="card-img-top"
                    alt="immagine dell'articolo {{ $article->title }}">
            </div>
            <div class="swiper-slide">
                <img src="https://picsum.photos/404" class="card-img-top"
                    alt="immagine dell'articolo {{ $article->title }}">
            </div>
        </div>
    </div>

    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-12 col-md-9">
                <h1 class="display-4"><span class=" fw-bold">Titolo: </span> {{$article->title}}</h1>
                <h3 class="display-6"><span class=" fw-bold">Categoria: </span> {{$article->category->name}}</h3>
                <h4><span class=" fw-bold">Descrizione: </span>{{$article->description }}</h4>
                
            </div>
        </div>
    </div>

</x-layout>
