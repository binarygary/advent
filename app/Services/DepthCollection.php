<?php

namespace App\Services;

use App\ValueObjects\Depth;
use Illuminate\Support\Collection;


class DepthCollection extends Collection {

	public function __construct( array $depths ) {
		parent::__construct(
			$this->get_value_objects( $depths )
		);
	}

	public function get_value_objects( array $depths ) {
		$value_objects = [];

		foreach ( $depths as $depth ) {
			if ( is_a( $depth, Depth::class) )  {
				$value_objects[] = $depth;
				continue;
			}

			$depth = is_numeric( trim( $depth ) ) ? (int) $depth : '';
			if ( ! is_int( $depth ) ) {
				continue;
			}

			$value_objects[] = new Depth( $depth );
		}

		return $value_objects;
	}

}