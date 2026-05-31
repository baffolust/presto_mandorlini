<x-layout title="{{__('ui.Revisor_Dashboard')}}">

    {{-- <x-display-session-message /> --}}

    {{-- @dd($article_to_check) --}}
    @if ($article_to_check)
        <div class="row justify-content-center pt-5">
            <div class="col-12 col-md-8">
                <div class="row justify-content-center g-3">
                    @if ($article_to_check->images->count())

                        @foreach ($article_to_check->images as $key => $image)
                            <div class="col-12 col-md-6 col-lg-4 text-center p-3 d-flex justify-content-center">
                                <img class="img-fluid shadow img-revisor" src="{{ $image->getUrl(300, 300) }}"
                                    alt="immagine dell'articolo {{ $article_to_check->title }}">
                            </div>
                        @endforeach
                    @else
                    <div class="col-12 text-center p-3 d-flex justify-content-center">
                                <img class="img-fluid rounded shadow img-revisor" src="{{ Storage::url('public/media/img/Image_not_available.png') }}"
                                    alt="immagine dell'articolo {{ $article_to_check->title }}">
                            </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="row justify-content-center py-5 m-3">
            <div class="col-12 col-md-7 ps-4 d-flex flex-column justify-content-between mb-3">
                <h1>{{ $article_to_check->title }}</h1>
                <h3>{{ __('ui.Author') }}: {{ $article_to_check->user->name }}</h3>
                <h4>{{ __('ui.Article_Price') }}: {{ $article_to_check->price }} €</h4>
                <h4>{{ __('ui.Category') }}: {{ __('ui.' . $article_to_check->category->name) }}</h4>
                <p class="h6">{{ $article_to_check->description }}</p>
            </div>
            <div class="d-flex pb-4 justify-content-center">
                <form class="mx-2" action="{{ route('revisor.article.accept', ['article' => $article_to_check]) }}"
                    method="POST">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="btn btn-success">{{ __('ui.Accept') }}</button>
                </form>
                <form class="mx-2" action="{{ route('revisor.article.reject', ['article' => $article_to_check]) }}"
                    method="POST">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="btn btn-danger">{{ __('ui.Reject') }}</button>
                </form>
            </div>
        </div>
    @else
        <div class="row justify-content-center align-items-center text-center">
            <div class="col-12">
                <h1>
                    {{ __('ui.No_Articles') }}
                </h1>
                <a href="{{ route('homepage') }}" class="btn btn-primary">{{ __('ui.Back_Homepage') }}</a>
            </div>
        </div>
    @endif
</x-layout>
