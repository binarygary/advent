<?php

namespace App\Services\Submarine;

use App\ValueObjects\Distance;
use Illuminate\Support\Collection;


class DistanceCollection extends Collection {

	public function __construct( array $distances ) {
		parent::__construct(
			$this->get_direction_value_objects( $distances )
		);
	}

	public function get_direction_value_objects( array $distances ) {
		$value_objects = [];

		foreach ( $distances as $distance ) {
			if ( is_a( $distance, Distance::class) )  {
				$value_objects[] = $distance;
				continue;
			}

			$distance = is_numeric( trim( $distance ) ) ? (int) $distance : '';
			if ( ! is_int( $distance ) ) {
				continue;
			}

			$value_objects[] = new Distance( $distance );
		}

		return $value_objects;
	}

}