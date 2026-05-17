<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{

    public $categories = [
        'Elettronica',
        'Abbigliamento',
        'Salute e Bellezza',
        'Motori',
        'Sport',
        'Cucina',
        'Libri e Riviste',
        'Casa e Giardinaggio',
        'Giocattoli',
        'Animali Domestici'

    ];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ($this->categories as $category) {
            Category::create([
                'name' => $category
            ]);
        }
    }
}
