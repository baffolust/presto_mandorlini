<?php

namespace App\Console\Commands;

use Meilisearch\Client;
use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;

#[Signature('app:setup-meilisearch-index')]
#[Description('Meilisearch Index Setup')]
class SetupMeilisearchIndex extends Command
{
    /**
     * Execute the console command.
     */
    public function handle()
    {
        $client = new Client(
            config('scout.meilisearch.host'),
            config('scout.meilisearch.key')
        );

        $index = $client->index('articles');

        $index->updateFilterableAttributes([
            'is_accepted',
            'category_id',
            'user_id',
        ]);

        $index->updateSearchableAttributes([
            'title',
            'description',
            'category',
        ]);

        $index->updateSortableAttributes([
            'created_at',
            'price',
        ]);
    }
}
