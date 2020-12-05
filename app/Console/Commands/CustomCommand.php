<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CustomCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'display:name {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'It will display your passed name in console';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info('Displaying your name in the console...');
        // $name = $this->argument('name');
        $this->info("Input name is: {$this->argument('name')}");
    }
}
