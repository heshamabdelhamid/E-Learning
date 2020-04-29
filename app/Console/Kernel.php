<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

use Carbon\Carbon;


class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {

      
      $schedule->call(function () {

         $reservation =  \DB::table('reservations')->where('status','pending')->where("created_at","<",Carbon::now()->subHours(72))->get();

          if(!empty($reservation)){

             foreach ($reservation as $reservations) {

                 \DB::table('reservations')->where('id',$reservations->id)->update(['status' => 'refused']);

             }
          }

        })->everyMinute();
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
