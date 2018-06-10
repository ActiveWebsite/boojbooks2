<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BookPageTest extends TestCase
{
    /**
     * Test the Book page is not accessible since not authorized.
     *
     * @return void
     */

    public function testBookPageTest()
    {
        $response = $this->get('/books');

        $response->assertStatus(302); //expect 302 since not logged in
    }

}
