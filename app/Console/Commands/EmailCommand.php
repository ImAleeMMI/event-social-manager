<?php

namespace App\Console\Commands;

use App\Mail\EmailTest;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class EmailCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:email-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $text = $this->argument('text');
        $is_slim = $this->option('slim');

        if($is_slim){
            $this->info($text. ''.$is_slim);
        }else{
            $this->info('Il testo inserito è: '.$text);
        }
        Mail::to('alessandrokuridza98@gmail.com')->send(new EmailTest(''));
    }
}
