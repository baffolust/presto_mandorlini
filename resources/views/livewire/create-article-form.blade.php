<div>

    <x-display-message :message="$message" />
    <x-display-errors />

    <form class="form-custom rounded-4 background-custom-op text-light p-4 shadow" wire:submit="store">
        <div class="mb-3">
            <label for="title" class="form-label">{{ __('ui.Article_Name') }}</label>
            <input type="text" class="form-control" id="title" value="{{ old('title') }}"
                wire:model.blur.live="title">
            @error('title')
                <span
                    class="text-danger-emphasis bg-danger-subtle border border-danger-subtle rounded-1 px-1">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">{{ __('ui.Description') }}</label>
            <textarea class="form-control" id="description" cols="30" rows="10" wire:model.blur.live="description">{{ old('description') }}  </textarea>
            @error('description')
                <span
                    class="text-danger-emphasis bg-danger-subtle border border-danger-subtle rounded-1 px-1">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">{{ __('ui.Article_Price') }}</label>
            <input type="text" class="form-control" id="price" value="{{ old('price') }}"
                wire:model.blur.live="price">
            @error('price')
                <span
                    class="text-danger-emphasis bg-danger-subtle border border-danger-subtle rounded-1 px-1">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="category" class="form-label">{{ __('ui.Article_Category') }}</label>
            <select id="category" class="form-control" wire:model.blur.live="category">
                <option label disabled>{{ __('ui.Select_Category') }}</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ __('ui.' . $category->name) }}</option>
                @endforeach
            </select>
            @error('category')
                <span
                    class="text-danger-emphasis bg-danger-subtle border border-danger-subtle rounded-1 px-1">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="images" class="form-label">{{ __('ui.Article_Images') }}</label>
            <input id="images" type="file" wire:model.live="temporary_images" multiple
                class="form-control shadow @error('temporary_images.*') is-invalid @enderror" placeholder="Img/">
            @error('temporary_images.*')
                <span class="text-danger-emphasis bg-danger-subtle border border-danger-subtle rounded-1 px-1">{{ $message }}</span>
            @enderror
            @error('temporary_images')
                <span class="text-danger-emphasis bg-danger-subtle border border-danger-subtle rounded-1 px-1">{{ $message }}</span>
            @enderror
        </div>
        @if (!empty($images))
            <div class="row mb-3 mx-1">
                <div class="col-12">
                <p>{{ __('ui.Article_Image_Preview') }}</p>
                <div class="row border border-4 border-success rounded shadow">
                    @foreach ($images as $key => $image)
                        <div class="col d-flex flex-column align-items-center my-3">
                            <div class="img-preview mx-auto shadow"
                                style="background-image: url({{ $image->temporaryUrl() }})" wire:key="{{$key}}"></div>
                            <button type="button" class="btn mt-1 btn-danger" wire:click="removeImage({{$key}})">X</button>
                        </div>
                    @endforeach
                </div>
                </div>
            </div>

        @endif

        <button type="submit" class="btn background-custom-highlight">{{ __('ui.Article_Insert') }}</button>
    </form>
</div>
