<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthorsTest extends TestCase
{
    use WithFaker, RefreshDatabase;


    /**
     * Test authors.index route returns 200 status
     *
     * @return void
     */
    public function test_can_read_authors_index() {
        $response = $this->get('/authors');

        $response->assertStatus(200);
    }

    /**
     * Test authors.store route
     *
     * @return void
     */
    public function test_can_create_author() {
        $author = [
            'name' => $this->faker->name,
            'biography' => $this->faker->sentence,
            'birthday' => $this->faker->date('Y-m-d'),
        ];

        $this->post('/authors', $author);

        $this->assertDatabaseHas('authors', $author);

        $this->get('/authors')->assertSee($author['name']);
    }

    /**
     * Test authors.show route
     *
     * @return void
     */
    public function test_can_show_author() {
        $author = [
            'name' => $this->faker->name,
            'biography' => $this->faker->sentence,
            'birthday' => $this->faker->date('Y-m-d'),
        ];

        $this->post('/authors', $author);

        $response = $this->get('/authors/1');

        $response->assertStatus(200);
    }

    /**
     * Test authors.update route
     *
     * @return void
     */
    public function test_can_update_author() {
        $author = [
            'name' => $this->faker->name,
            'biography' => $this->faker->sentence,
            'birthday' => $this->faker->date('Y-m-d'),
        ];

        $this->post('/authors', $author);

        // Update the newly created author
        $authorUpdated = [
            'name' => $this->faker->name,
            'biography' => $this->faker->sentence,
            'birthday' => $this->faker->date('Y-m-d'),
        ];

        $this->json('PUT', '/authors/1', $authorUpdated);

        $this->get('/authors')->assertSee($authorUpdated['name']);
    }

    /**
     * Test authors.delete route
     *
     * @return void
     */
    public function test_can_delete_author() {
        $author = [
            'name' => $this->faker->name,
            'biography' => $this->faker->sentence,
            'birthday' => $this->faker->date('Y-m-d'),
        ];

        $this->post('/authors', $author);

        $this->assertDatabaseHas('authors', $author);

        $this->delete('/authors/1');

        $this->assertDatabaseMissing('authors', $author);
    }
}
