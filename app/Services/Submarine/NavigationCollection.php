<?php

namespace App\Services\Submarine;

use App\ValueObjects\Direction;
use App\ValueObjects\Directions;
use App\ValueObjects\Distance;
use App\ValueObjects\NavigationInstruction;
use Illuminate\Support\Collection;

class NavigationCollection extends Collection {

	public function __construct( array $nav_instructions ) {
		parent::__construct(
			$this->get_navigation_value_objects( $nav_instructions )
		);
	}

	private function get_navigation_value_objects( array $nav_instructions ) {
		return array_map( function ( $nav_instruction ) {
			$commands = explode( ' ', $nav_instruction );

			if ( count( $commands ) !== 2 ) {
				return null;
			}

			return new NavigationInstruction(
				new Direction( Directions::from( $commands[0] ) ),
				new Distance( $commands[1] )
			);

		}, $nav_instructions );
	}
}