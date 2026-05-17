<?php

namespace App\Livewire;

use App\Models\Article;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreateArticleForm extends Component
{

    #[Validate('min:3', message: 'Il titolo deve essere lungo almeno 3 caratteri')]
    #[Validate('required', message: 'Il titolo è obbligatorio')]
    public $title;

    #[Validate('min:30', message: 'La descrizione deve essere lunga almeno 30 caratteri')]
    #[Validate('required', message: 'La descrizione è obbligatoria')]
    public $description;

    #[Validate('numeric', message: 'Il prezzo deve essere un numero')]
    #[Validate('required', message: 'Il prezzo è obbligatorio')]
    public $price;

    #[Validate('required', message: 'La categoria è obbligatoria')]
    public $category;
    public $message = null;

    public $article;

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

        $this->reset();

        $this->message = 'Articolo inserito correttamente';
    }


    public function render()
    {
        return view('livewire.create-article-form');
    }
}
