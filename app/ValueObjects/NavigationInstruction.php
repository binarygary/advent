<?php

namespace App\ValueObjects;

class NavigationInstruction {

	public function __construct(
		private Direction $direction,
		private Distance $depth
	) {}

}