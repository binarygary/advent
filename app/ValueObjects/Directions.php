<?php

namespace App\ValueObjects;

enum Directions {

	case FORWARD;
	case DOWN;
	case UP;

	public function direction(): string {
		return match ( $this ) {
			self::DOWN => 'down',
			self::FORWARD => 'forward',
			self::UP => 'up',
		};
	}

}