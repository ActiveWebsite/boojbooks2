<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthorPageTest extends TestCase
{
    /**
     * Test that the author page is not accessible since not authorized.
     *
     * @return void
     */

    public function testAuthorPageTest()
    {
        $response = $this->get('/authors');

        $response->assertStatus(302); //expect 302 since not logged in
    }
}
