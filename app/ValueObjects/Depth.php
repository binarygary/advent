<?php

namespace App\ValueObjects;

class Depth {

	private $depth;

	public function __construct(int $depth) {
        $this->depth = $depth;
    }

	public function getDepth(): int {
        return $this->depth;
    }

	public function equals( Depth $depth ) {
		return $this->depth === $depth->getDepth();
	}

	public function greaterThan( Depth $depth ) {
        return $this->depth > $depth->getDepth();
    }

}