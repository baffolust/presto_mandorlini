<div class="card background-custom-tertiary mx-auto text-center my-2 mb-4 shadow rounded-4">
    <img src="https://picsum.photos/700" class="card-img-top card-img-cat-custom" alt="immagine dell'articolo {{$article->title}}">
    <div class="card-body">
        <h3 class="card-title py-1 text-bold">{{$article->title}}</h3>
        <h5 class="card-subtitle py-1">{{$article->price}}€</h5>

        <p class="card-text mt-2">Brief description here. Max 50 letters</p>
        
    </div>
    <div class="card-body p-1">
        <a href="{{route('article.show', compact('article'))}}" class="card-link">{{__("ui.Show_Article")}}</a>
        <a href="#" class="card-link">{{__("ui.Another_Link")}}</a>
    </div>
</div>
