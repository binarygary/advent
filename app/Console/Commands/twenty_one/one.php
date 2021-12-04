<?php

namespace App\Console\Commands\twenty_one;

use App\Services\DepthCollection;
use App\Services\DepthReporter;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class one extends Command {
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'advent:2021:1';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Runs the 2021 1 command';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct() {
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return int
	 */
	public function handle() {
		$depth_reporter = new DepthReporter();

		$data = explode( PHP_EOL, File::get(
			Storage::path( 'input/2021/data1.txt' ) )
		);

		$depth_collection = new DepthCollection( $data );

		echo $depth_reporter->depths( $depth_collection )->report()->getDepthIncreases();


		return Command::SUCCESS;
	}
}
