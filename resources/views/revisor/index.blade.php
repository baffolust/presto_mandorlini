<x-layout title="{{ __('ui.Revisor_Dashboard') }}">

    {{-- <x-display-session-message /> --}}

    {{-- @dd($article_to_check) --}}
    @if ($article_to_check)

        <div class="row justify-content-center pt-5">
            <div class="col-12 col-md-8">
                <div class="row g-4 align-items-start">
                    @if ($article_to_check->images->count())

                        @foreach ($article_to_check->images as $key => $image)
                            {{-- IMMAGINE --}}
                            <div class="col-12 col-md-6 col-lg-4 text-center">
                                <div class="article-wrapper-custom p-2">
                                    <img class="img-fluid shadow img-revisor" src="{{ $image->getUrl(300, 300) }}"
                                        alt="immagine dell'articolo {{ $article_to_check->title }}">
                                </div>
                            </div>

                            {{-- LABELS --}}
                            <div class="col-md-5 ps-3">
                                <div class="p-3 rounded-4 shadow-sm background-custom-tertiary">
                                    <h6 class="text-uppercase text-muted mb-3">Labels</h6>
                                    @if ($image->labels)
                                        <div class="d-flex flex-wrap gap-1">
                                            @foreach ($image->labels as $label)
                                                <span class="badge background-custom-secondary text-custom-primary">
                                                    #{{ $label }} </span>
                                            @endforeach
                                        </div>
                                    @else
                                        <span class="text-muted fst-italic">No labels</span>
                                    @endif
                                </div>
                            </div>

                            {{-- RATINGS --}}
                            <div class="col-12 col-md-3 ps-2">
                                <div class="p-3 rounded-4 shadow-sm background-custom-tertiary">
                                    <h6 class="text-uppercase text-muted mb-3">Ratings</h6>
                                    <div class="revisor-ratings">
                                        <div>Adult <span class="{{ $image->adult }}"></span></div>
                                        <div>Violence <span class="{{ $image->violence }}"></span></div>
                                        <div>Spoof <span class="{{ $image->spoof }}"></span></div>
                                        <div>Racy <span class="{{ $image->racy }}"></span></div>
                                        <div>Medical <span class="{{ $image->medical }}"></span></div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="col-12 text-center p-3 d-flex justify-content-center">
                            <img class="img-fluid rounded shadow img-revisor"
                                src="{{ Storage::url('public/media/img/Image_not_available.png') }}"
                                alt="immagine dell'articolo {{ $article_to_check->title }}">
                        </div>
                    @endif
                </div>
            </div>
        </div>

        {{-- ARTICLE INFO + ACTION BUTTONS --}}

        <div class="container pb-5">

            <div class="row justify-content-center py-5 m-3">
                <x-info-article :article="$article_to_check"/>
                <div class="row justify-content-center mt-4">
                    <div class="col-12 col-md-6 d-flex justify-content-center gap-3">
                        <form class="mx-2" action="{{ route('revisor.article.accept', ['article' => $article_to_check]) }}"
                            method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-success px-4">{{ __('ui.Accept') }}</button>
                        </form>
                        <form class="mx-2" action="{{ route('revisor.article.reject', ['article' => $article_to_check]) }}"
                            method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-danger px-4">{{ __('ui.Reject') }}</button>
                        </form>
                    </div>
                </div>
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
