<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Faker\Factory as Faker;
use DB;

class createrecords extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'createrecords:router {number}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create Router Records';

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
        $number = $this->argument('number');

        $strings = array(
            'ag1',
            'css',
        );
        
        $faker = Faker::create();
    	foreach (range(1,$number) as $index) {
            $key = array_rand($strings);
	        DB::table('router_info')->insert([
	            'sapid' => $faker->unique()->regexify('[A-Za-z0-9]{18}'),
	            'hostname' => $faker->unique()->name,
                'loopback' => $faker->unique()->regexify('[0-9.]{18}'),
                'mac_address' => $faker->unique()->regexify('[A-Za-z0-9]{17}'),
                'type' => $strings[$key]
	        ]);
	}
    }
}
