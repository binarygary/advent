<?php

namespace Tests\Feature\twenty_one;

use App\Services\Submarine\DistanceCollection;
use App\Services\Submarine\DepthReporter;
use Tests\TestCase;

class oneTest extends TestCase {

	protected $test_data = '199
200
208
210
200
207
240
269
260
263';

	public function test_can_create_collection() {
		$depths = explode( PHP_EOL, $this->test_data );

		$depth_collection = new DistanceCollection( $depths );

		$this->assertIsObject($depth_collection);
	}

	public function test_depth_reporter_logic_works() {
		$depths = explode( PHP_EOL, $this->test_data );

		$depth_reporter = new DepthReporter();
		$depth_reporter->depths( new DistanceCollection( $depths ) );

		$this->assertEquals(
			$depth_reporter->report()->getDepthIncreases(),
			7
		);
	}

	public function test_can_build_three_packs() {
		$depths = explode( PHP_EOL, $this->test_data );

        $depth_reporter = new DepthReporter();
        $depth_reporter->depths( new DistanceCollection( $depths ) );

        $this->assertEquals(
            $depth_reporter->sliding_depth_report(3)->getDepthIncreases(),
            5
        );
	}
}
