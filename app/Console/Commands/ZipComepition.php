<?php

namespace App\Console\Commands;

use App\festival;
use App\Http\Controllers\admin\CompetitonController;
use Illuminate\Console\Command;

class ZipComepition extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'competiton:mausolea';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
     * @return int
     */
    public function handle()
    {
        $festival=festival::latest()->first();

        $CompetitonController=new CompetitonController();
        $CompetitonController->download();
    }
}
