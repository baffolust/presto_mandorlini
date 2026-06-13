<x-layout title="{{ __('ui.All_Articles_of') }} {{ __('ui.' . $category->name) }}">

    <div class="container py-4">


        {{-- Card Articles Section --}}
        <section>

            <div class="row g-4">
                @forelse ($articles as $article)
                    <div class="col-12">
                        <div class="article-wrapper-custom">
                            <x-card-article-wide :article="$article" />
                        </div>
                    </div>
                @empty
                    <div class="col-12 empty-state text-center py-3 text-custom-secondary">
                        <h3>{{ __('ui.No_Articles') }}</h3>
                    </div>
                @endforelse
            </div>
        </section>
    </div>

</x-layout>
