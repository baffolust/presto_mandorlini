<?php

namespace App\Livewire;

use App\Jobs\GoogleVisionLabelImage;
use App\Jobs\GoogleVisionSafeSearch;
use App\Jobs\ResizeImage;
use App\Models\Article;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateArticleForm extends Component
{
    use WithFileUploads;

    #[Validate('min:3', message: 'Il titolo deve essere lungo almeno 3 caratteri')]
    #[Validate('required', message: 'Il titolo è obbligatorio')]
    public $title;

    #[Validate('min:30', message: 'La descrizione deve essere lunga almeno 30 caratteri')]
    #[Validate('max:255', message: 'La descrizione deve essere lunga massimo 255 caratteri')]
    #[Validate('required', message: 'La descrizione è obbligatoria')]
    public $description;

    #[Validate('numeric', message: 'Il prezzo deve essere un numero')]
    #[Validate('required', message: 'Il prezzo è obbligatorio')]
    public $price;

    #[Validate('required', message: 'La categoria è obbligatoria')]
    public $category;
    public $message = null;

    public $article;

    public $images = [];
    public $temporary_images = [];

    public function updatedTemporaryImages()
    {
        /* Introdotto try/catch con reset dell'array temporary_images per gestire foto non validate e foto cancellate che restavano memorizzate nell'array  */
        try {
            $this->validate([
                'temporary_images.*' => 'image|max:1024',
                'temporary_images' => 'max:6',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            $this->reset('temporary_images');
            throw $e;
        }

        foreach ($this->temporary_images as $image) {
            $this->images[] = $image;
        }

        $this->reset('temporary_images');
    }

    public function store()
    {
        $this->validate();

        $this->article = Article::create([
            'title' => $this->title,
            'description' => $this->description,
            'price' => $this->price,
            'category_id' => $this->category,
            'user_id' => Auth::id()
        ]);

        if (count($this->images) > 0) {
            foreach ($this->images as $image) {
                $newFileName = "articles/{$this->article->id}";
                $newImage = $this->article->images()->create(['path' => $image->store($newFileName, 'public')]);
                dispatch(new ResizeImage($newImage->path, 300, 300));
                dispatch(new GoogleVisionSafeSearch($newImage->id));
                dispatch(new GoogleVisionLabelImage($newImage->id));
            }
            File::deleteDirectory(storage_path('app/livewire-tmp'));
        }

        $this->message = 'Articolo inserito correttamente';
        $this->cleanForm();
    }

    public function removeImage($key)
    {
        if (in_array($key, array_keys($this->images))) {
            unset($this->images[$key]);
        }

        /* Aggiunto per eliminare foto anche dall'array temporary_images, evitando così il ripresentarsi dell'immagine dopo averla eliminata e ricaricata */
        if (in_array($key, array_keys($this->temporary_images))) {
            unset($this->temporary_images[$key]);
        }

        $this->images = array_values($this->images);
        $this->temporary_images = array_values($this->temporary_images);
    }

    protected function cleanForm()
    {
        $this->title = '';
        $this->description = '';
        $this->category = '';
        $this->price = '';
        $this->images = [];
    }


    public function render()
    {
        return view('livewire.create-article-form');
    }


}
