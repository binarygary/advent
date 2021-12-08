<?php

namespace App\ValueObjects;

class Direction {

	public function __construct(
		private Directions $direction,
		private int $distance
	) {}

	

}