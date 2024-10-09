<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class UpdateUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:update-users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "updates user's firstname, lastname, and timezone to new random ones";

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $timezones = ['CET','CST','GMT+1'];
        User::all()->each(function ($user) use ($timezones) {
            $user->update(['time_zone' => $timezones[array_rand($timezones)]]);
        });
    }
}
