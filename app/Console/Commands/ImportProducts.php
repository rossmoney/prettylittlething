<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Http\Controllers\ProductsController;

class ImportProducts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'products:import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import products from CSV to database table prettylittlething.products';

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
        $message = app('App\Helpers\Products')->importProducts();
        echo $message . "\r\n";
    }
}
