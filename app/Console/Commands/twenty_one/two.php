<?php

namespace App\Console\Commands\twenty_one;

use App\Services\Submarine\DepthReporter;
use App\Services\Submarine\DistanceCollection;
use App\Services\Submarine\NavigationCollection;
use App\Services\Submarine\Pilot;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class two extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'advent:2021:2';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Day 2';

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
		$data = explode( PHP_EOL, File::get(
			Storage::path( 'input/2021/data2.txt' ) )
		);

		$navigation_collection = new NavigationCollection( $data );

		$pilot = new Pilot( $navigation_collection );

		echo 'Diagonal distance:' . $pilot->navigate()->diagonal_distance() . PHP_EOL;

		$pilot = new Pilot( $navigation_collection );
		echo 'Diagonal distance with aim:' . $pilot->navigate_with_aim()->diagonal_distance() . PHP_EOL;

		return Command::SUCCESS;
    }
}
