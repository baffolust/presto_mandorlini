<div class="card card-index-custom mx-auto text-center background-custom-tertiary my-2 mb-4 shadow rounded-4">
    <img src="{{$article->images->isNotEmpty() ? $article->images->first()->getUrl(300, 300) : Storage::url('public/media/img/Image_not_available.png')}}" class="card-img-top" alt="immagine dell'articolo {{$article->title}}">
    <div class="card-body">
        <h5 class="card-title">{{$article->title}}</h5>
        <p class="card-text">Brief description here. Max 50 letters</p>
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item">{{$article->price}} €</li>
        <li class="list-group-item">
            <a href="{{route('article.byCategory', compact('category'))}}">{{__("ui.$category->name")}}</a>
        </li>
        <li class="list-group-item">A third item</li>
    </ul>
    <div class="card-body">
        <a href="{{route('article.show', compact('article'))}}" class="card-link">{{__("ui.Show_Article")}}</a>
        <a href="#" class="card-link">{{__("ui.Another_Link")}}</a>
    </div>
</div>
