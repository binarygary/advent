<?php

namespace App\ValueObjects;

enum Directions: string {
	case FORWARD = 'forward';
	case DOWN = 'down';
	case UP = 'up';

	public function direction() {
		return match ( $this ) {
			Directions::FORWARD => 'forward',
            Directions::DOWN => 'down',
            Directions::UP => 'up',
		};
	}
}