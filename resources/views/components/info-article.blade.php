<div class="row justify-content-center">
    <div class="col-12 col-md-9">
        <div class="article-info-card background-custom-op rounded-4 p-4 shadow">
            <h1 class="article-title mb-3">{{ $article->title }}</h1>
            <div class="mb-3 text-custom-tertiary"><strong class="fw-bold">{{ __('ui.Author') }}: </strong>
                {{ $article->user->name }}</div>
            <div class="mb-3 text-custom-tertiary"><strong class="fw-bold">{{ __('ui.Category') }}: </strong>
                {{ __('ui.' . $article->category->name) }}</div>
            <div class="text-custom-tertiary"><span class="h5 fw-bold">{{ __('ui.Description') }}:
                </span>{{ $article->description }}</div>
        </div>
    </div>
</div>
