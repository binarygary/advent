<?php

namespace App\Services;

use App\ValueObjects\Depth;
use phpDocumentor\Reflection\Types\Collection;

class DepthReporter {

	/**
	 * @var DepthCollection
	 */
	private $depths;

	/**'
	 * @var int
	 */
	private $depth_increases = 0;

	/**
	 * @var Depth
	 */
	private $first_depth;

	/**
	 * @var Depth
	 */
	private $secong_depth;


	public function depths( DepthCollection $depths ) {
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

	public function getDepthIncreases() {
		return $this->depth_increases;
	}

}