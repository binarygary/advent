<?php

namespace App\ValueObjects;

class Direction {

	public function __construct(
		private Directions $direction,
	) {}

	public function getDirection(): Directions {
		return $this->direction;
    }

}