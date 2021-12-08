<?php

namespace Tests\Feature\twenty_one;

use App\Services\Submarine\NavigationCollection;
use App\Services\Submarine\Pilot;
use Tests\TestCase;

class twoTest extends TestCase {

	protected $test_data = 'forward 5
down 5
forward 8
up 3
down 8
forward 2';

	public function test_pilot() {
		$directions = explode( PHP_EOL, $this->test_data );

		$navigation_collection = new NavigationCollection( $directions );

		$pilot = new Pilot( $navigation_collection );

		$this->assertEquals( $pilot->navigate()->diagonal_distance(), 150 );
	}

	public function test_pilot_with_aim() {
		$directions = explode( PHP_EOL, $this->test_data );

		$navigation_collection = new NavigationCollection( $directions );

		$pilot = new Pilot( $navigation_collection );

		$this->assertEquals( $pilot->navigate_with_aim()->diagonal_distance(), 900 );
	}
}
