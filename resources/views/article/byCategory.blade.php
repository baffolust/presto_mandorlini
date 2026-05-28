<x-layout title="{{ __('ui.All_Articles_of')}} {{ __('ui.' . $category->name) }}">

    <div class="container">

        {{-- Card Articles Section --}}
        <section>

            <div class="row article-section-custom justify-content-center align-items-center">
                @forelse ($articles as $article)
                    <div class="col-12">
                        <x-card-article-wide :article="$article" />
                    </div>
                @empty
                    <div class="col-12">
                        <h3>{{__("ui.No_Articles")}}</h3>
                    </div>
                @endforelse
            </div>
        </section>
    </div>

</x-layout>
