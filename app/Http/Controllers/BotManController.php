<?php

namespace App\Http\Controllers;

use BotMan\BotMan\Messages\Incoming\Answer;

class BotmanController extends Controller
{
    public function handle()
    {
        $botman = app('botman');

        $botman->hears('{message}', function($botman, $message) {

            if ($message == 'hi' || $message == 'hello') {
                $botman->reply("Hello , do you need help? type help please");
            }else if ($message == 'help' || $message == 'help please') {
                $botman->reply("Which part you do not understand? type one of the following please :
                locations/professeurs/home/eleves/seances/groupes .  If you want to exit say Bye
                ");
            }
            else if ($message == 'locations' || $message == 'professeurs'|| $message == 'professeurs'|| $message == 'home'|| $message == 'professeurs'|| $message == 'eleves' || $message == 'seances' || $message == 'groupes') {
                $botman->reply(" It it is for the management of the  " . $message . " for further details you can open the menu and visit ".$message. " section");
            }
            else if ($message == 'bye' || $message == 'goodbye' || $message == 'see you' || $message == 'ok') {
                $botman->reply("Hmmm I think you get tired of me , Im joking ahahahaha , See you");
            }else{
                $botman->reply("Sorry I don't understand you ...");
            }

        });


        $botman->listen();
    }
}