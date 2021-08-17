<?php

namespace App\Console;

use App\Console\Commands\AlterRecords;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        Commands\AlterRecords::class
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
       /*  $schedule->call(function () {
            DB::table('oferta_especials')->where('id', 5)->delete();
        })->everyMinute();*/

           /*  $schedule->call(function () {
                DB::table('oferta_especials')
            ->where('id', 4)
            ->update(['estado' => '0']);
            })->everyMinute(); */
            $schedule->command('alter:column')->everyMinute();

    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
