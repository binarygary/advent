<?php

namespace App\Services\Submarine;

use App\ValueObjects\Directions;
use App\ValueObjects\NavigationInstruction;

class Pilot {

	private $depth = 0;
	private $distance = 0;
	private $aim = 0;

	public function __construct(
		private NavigationCollection $navigation
	) {}

	public function navigate() {
		$this->navigation->map( function ( NavigationInstruction $navigation_instruction ) {
			if ( Directions::FORWARD == $navigation_instruction->getDirection() ) {
				$this->distance += $navigation_instruction->getDistance();
			} else if ( Directions::DOWN == $navigation_instruction->getDirection() ) {
				$this->depth += $navigation_instruction->getDistance();
			} else {
				$this->depth -= $navigation_instruction->getDistance();
			}
		} );

		return $this;
	}

	public function navigate_with_aim() {
		$this->navigation->map( function ( NavigationInstruction $navigation_instruction ) {
			if ( Directions::FORWARD == $navigation_instruction->getDirection() ) {
				$this->distance += $navigation_instruction->getDistance();
				$this->depth += $this->aim * $navigation_instruction->getDistance();
			} else if ( Directions::DOWN == $navigation_instruction->getDirection() ) {
				$this->aim += $navigation_instruction->getDistance();
			} else {
				$this->aim -= $navigation_instruction->getDistance();
			}
		} );

		return $this;
	}

	public function diagonal_distance() {
		return $this->distance * $this->depth;
	}

}