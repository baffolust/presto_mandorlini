<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;

#[Signature('app:make-user-revisor {email}')]
#[Description('Make an user be a revisor')]
class MakeUserRevisor extends Command
{
    /**
     * Execute the console command.
     */
    public function handle()
    {
        $user = User::where('email', $this->argument('email'))->first();
        if(!$user){
            return $this->error('Utente non trovato');
            
        }
        $user->is_revisor = true;
        $user->save();
        return $this->info("Utente ($user->name) adesso è revisore");

    }
}
