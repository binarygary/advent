<?php

namespace App\Services\Submarine;

use App\ValueObjects\Distance;

class DepthReporter {

	/**
	 * @var DistanceCollection
	 */
	private $depths;

	/**'
	 * @var int
	 */
	private $depth_increases = 0;

	/**
	 * @var Distance
	 */
	private $first_depth;

	public function depths( DistanceCollection $depths ) {
		$this->depths = $depths;

		return $this;
	}

	public function report() {
		$this->first_depth = $this->depths->first();

		$this->depths->map( function ( $depth ) {
			if ( $depth->greaterThan( $this->first_depth ) ) {
				$this->depth_increases ++;
			}

			$this->first_depth = $depth;
		} );

		return $this;
	}

	public function sliding_depth_report( $sliding_depth ) {
		// Get the sum of the first 3 depths
		$this->first_depth = $this->depths->slice( 0, $sliding_depth )->sum( function ( Distance $depth ) {
			return $depth->getDistance();
		} );

		for ( $i = 1; $i <= $this->depths->count(); $i ++ ) {
			$current_depth = $this->depths->slice( $i, $sliding_depth )->sum( function ( $depth ) {
				return $depth->getDistance();
			} );

			if ( $current_depth > $this->first_depth ) {
				$this->depth_increases ++;
			}

			$this->first_depth = $current_depth;
		}


		return $this;
	}

	public function getDepthIncreases() {
        return $this->depth_increases;
    }

}