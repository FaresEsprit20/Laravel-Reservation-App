<?php

namespace App\Http\Controllers;

use BotMan\BotMan\Messages\Incoming\Answer;

class BotmanController extends Controller
{
    public function handle()
    {
        $botman = app('botman');

        $botman->hears('{message}', function($botman, $message) {

            if ($message == 'hi') {
                $botman->reply("write 'hi' for testing...");
                
            }else{
                $botman->reply("write 'hi' for testing...");
            }

        });

        $botman->listen();
    }
}