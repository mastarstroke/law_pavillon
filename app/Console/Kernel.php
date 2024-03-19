<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Models\User;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // $schedule->command('inspire')->hourly();

        $users = User::query()->where('photo', 'NULL')
        ->getModels('*');

        $schedule->call(function () {

            foreach ($users as $user) {

                $email = $user->email;
                sendPhotoNotificationEmail($email, $user);
            }
        })->weekly()->mondays()->at('12:00');


    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
