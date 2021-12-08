<?php

namespace Tests\Feature\twenty_one;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class twoTest extends TestCase
{

	protected $test_data = 'forward 5
down 5
forward 8
up 3
down 8
forward 2';

    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
