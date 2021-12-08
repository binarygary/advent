<?php

namespace App\ValueObjects;

class NavigationInstruction {

	public function __construct(
		private Direction $direction,
		private Distance $distance
	) {}

	public function getDirection(): Directions {
        return $this->direction->getDirection();
    }

	public function getDistance(): int {
        return $this->distance->getDistance();
    }

}