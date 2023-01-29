<?php

namespace App\Commands;

use Illuminate\Console\Scheduling\Schedule;
use LaravelZero\Framework\Commands\Command;

class Createapp extends Command
{
    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = 'create-app';

    /**
     * The description of the command.
     *
     * @var string
     */
    protected $description = 'Create a new Yolk app';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $projectname = $this->ask('What is the name of your project?');
        $this->info('Creating a new Yolk app '.$projectname);
        $this->info('This may take a few minutes...');
        $this->info('Please wait...');

        // $ch = curl_init();

        // set URL and other appropriate options

        $path = getcwd();
        // $url = 'https://github.com/dollarstir/demo/archive/refs/heads/main.zip';
        // $local_file = $path.'/'.$projectname.'.zip';

        // $fp = fopen($local_file, 'w+');
        // $ch = curl_init();
        // curl_setopt($ch, CURLOPT_URL, $url);
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        // curl_setopt($ch, CURLOPT_FILE, $fp);
        // curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        // curl_exec($ch);
        // curl_close($ch);
        // fclose($fp);

        // Open the archive file
        // shell_exec('unzip '.$local_file.' -d '.$path);
        shell_exec(' curl https://phpyolk.com/Archive.zip --progress-bar  --output '.$projectname.'.zip');
        $this->info('Unzipping........');
        shell_exec('unzip '.$projectname.'.zip -d '.$path.'/'.$projectname);
        shell_exec('rm '.$projectname.'.zip');

        $this->info('Done!');
        $this->info('Your new app is ready to go!');
        $this->info('To run your app, cd into the directory '.$projectname.' and start your server with php -S localhost:8000');
    }

    /**
     * Define the command's schedule.
     */
    public function schedule(Schedule $schedule): void
    {
        // $schedule->command(static::class)->everyMinute();
    }
}
