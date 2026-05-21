<div class="card card-index-custom mx-auto text-center background-custom-tertiary my-2 mb-4 shadow rounded-4">
    <img src="https://picsum.photos/300" class="card-img-top" alt="immagine dell'articolo {{$article->title}}">
    <div class="card-body">
        <h5 class="card-title">{{$article->title}}</h5>
        <p class="card-text">Brief description here. Max 50 letters</p>
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item">{{$article->price}} €</li>
        <li class="list-group-item">
            <a href="{{route('article.byCategory', compact('category'))}}">{{ $category->name }}</a>
        </li>
        <li class="list-group-item">A third item</li>
    </ul>
    <div class="card-body">
        <a href="{{route('article.show', compact('article'))}}" class="card-link">Mostra Articolo</a>
        <a href="#" class="card-link">Another link</a>
    </div>
</div>
