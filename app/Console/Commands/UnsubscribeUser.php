<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\Event;

class UnsubscribeUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:unsubscribe-user {id_event} {id_user?} {--all}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Commando che disiniscrivi gli utenti dal evento';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $all = $this->option('all');
        $eventId = $this->argument('id_event');


        $event = Event::find($eventId);



        if (!$event) {
            $this->error('Evento non trovato!');
            return;
        }

        if ($all) {
            $event->users()->detach();
            $this->info("Tutti gli utenti sono stati disiscritti al evento $event->name");
        } else {

            $userId = $this->argument('id_user');
            $user = User::find($userId);
            if (!$user) {
                $this->error('utente non trovato!');
                return;
            }
            $event->users()->detach($userId);
            $this->info("l'utente $user->name è stato disiscritto dall' evento $event->name");
        }


        
    }
}
