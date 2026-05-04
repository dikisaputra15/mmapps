<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected $commands = [
        \App\Console\Commands\AutoStatistik::class,
        \App\Console\Commands\Incident::class,
        \App\Console\Commands\Subincident::class,
        \App\Console\Commands\Socialconflict::class,
        \App\Console\Commands\Weapon::class,
        \App\Console\Commands\Explosive::class,
        \App\Console\Commands\Firearm::class,
        \App\Console\Commands\Actor::class,
        \App\Console\Commands\Businessactor::class,
        \App\Console\Commands\Eaosactor::class,
        \App\Console\Commands\Govactor::class,
        \App\Console\Commands\Intelactor::class,
        \App\Console\Commands\Milactor::class,
        \App\Console\Commands\Actorgender::class,
        \App\Console\Commands\Actorage::class,
        \App\Console\Commands\Target::class,
        \App\Console\Commands\Targetbusiness::class,
        \App\Console\Commands\Targeteaos::class,
        \App\Console\Commands\Targetgov::class,
        \App\Console\Commands\Targetintel::class,
        \App\Console\Commands\Targetmil::class,
        \App\Console\Commands\Targettype::class,
        \App\Console\Commands\Targetgender::class,
        \App\Console\Commands\Targetage::class,
        \App\Console\Commands\Tanggal::class,
        \App\Console\Commands\Violence::class,
        \App\Console\Commands\Articlelink::class,
        \App\Console\Commands\Time::class,
        \App\Console\Commands\Numberprotest::class,
        \App\Console\Commands\Issue::class,
    ];
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        $schedule->command('task:runcategory')->everyTenMinutes();;

        $schedule->command('task:runincident')->everyFifteenMinutes();

        $schedule->command('task:runsubincident')->everyFifteenMinutes();

        $schedule->command('task:runsocialconflict')->everyFifteenMinutes();

        $schedule->command('task:runweapon')->everyFifteenMinutes();

        $schedule->command('task:runexplosive')->everyFifteenMinutes();

        $schedule->command('task:runfirearm')->everyFifteenMinutes();

        $schedule->command('task:runactor')->everyFifteenMinutes();

        $schedule->command('task:runbusinessactor')->everyFifteenMinutes();

        $schedule->command('task:runeaosactor')->everyFifteenMinutes();

        $schedule->command('task:rungovactor')->everyFifteenMinutes();

        $schedule->command('task:runintelactor')->everyFifteenMinutes();

        $schedule->command('task:runmilactor')->everyFifteenMinutes();

        $schedule->command('task:runactorgender')->everyFifteenMinutes();

        $schedule->command('task:runactorage')->everyFifteenMinutes();

        $schedule->command('task:runtarget')->everyFifteenMinutes();

        $schedule->command('task:runtargetbusiness')->everyFifteenMinutes();

        $schedule->command('task:runtargeteaos')->everyFifteenMinutes();

        $schedule->command('task:runtargetgov')->everyFifteenMinutes();

        $schedule->command('task:runtargetintel')->everyFifteenMinutes();

        $schedule->command('task:runtargetmil')->everyFifteenMinutes();

        $schedule->command('task:runtargettype')->everyFifteenMinutes();

        $schedule->command('task:runtargetgender')->everyFifteenMinutes();

        $schedule->command('task:runtargetage')->everyFifteenMinutes();

        $schedule->command('task:runtanggal')->everyFifteenMinutes();

        $schedule->command('task:runviolence')->everyFifteenMinutes();

        $schedule->command('task:runarticlelink')->everyFifteenMinutes();

        $schedule->command('task:runtime')->everyFifteenMinutes();

        $schedule->command('task:runterorist')->everyFifteenMinutes();

        $schedule->command('task:runnumberprotest')->everyFifteenMinutes();

        $schedule->command('task:runissue')->everyFifteenMinutes();
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
