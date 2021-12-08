<?php

namespace App\ValueObjects;

class Distance {

	private $distance;

	public function __construct(int $distance) {
        $this->distance = $distance;
    }

	public function getDistance(): int {
        return $this->distance;
    }

	public function equals( Distance $distance ) {
		return $this->distance === $distance->getDistance();
	}

	public function greaterThan( Distance $depth ) {
        return $this->distance > $depth->getDistance();
    }

}