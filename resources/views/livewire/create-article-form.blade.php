<div>

    <x-display-message :message="$message"/>
    <x-display-errors/>

    <form class="form-custom rounded-4 background-custom-op text-light p-4 shadow" wire:submit="store">
        <div class="mb-3">
            <label for="title" class="form-label">Nome dell'articolo</label>
            <input type="text" class="form-control" id="title" value="{{ old('title') }}" wire:model.blur.live="title">
            @error('title') <span class="text-danger-emphasis bg-danger-subtle border border-danger-subtle rounded-1 px-1">{{ $message }}</span> @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Descrizione</label>
            <textarea class="form-control" id="description" cols="30" rows="10" wire:model.blur.live="description" >{{ old('description') }}  </textarea>
            @error('description') <span class="text-danger-emphasis bg-danger-subtle border border-danger-subtle rounded-1 px-1">{{ $message }}</span> @enderror
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Prezzo</label>
            <input type="text" class="form-control" id="price" value="{{ old('price') }}" wire:model.blur.live="price">
            @error('price') <span class="text-danger-emphasis bg-danger-subtle border border-danger-subtle rounded-1 px-1">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label for="category" class="form-label">Categoria</label>
            <select id="category" class="form-control" wire:model.blur.live="category">
                <option label disabled>Seleziona una categoria</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category') <span class="text-danger-emphasis bg-danger-subtle border border-danger-subtle rounded-1 px-1">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="btn background-custom-highlight">Inserisci Articolo</button>
    </form>
</div>
