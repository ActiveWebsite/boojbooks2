<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BooksTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /**
     * Test books.index route returns 200 status
     *
     * @return void
     */
    public function test_can_read_books_index() {
        $response = $this->get('/books');

        $response->assertStatus(200);
    }

    /**
     * Test books.store route
     *
     * @return void
     */
    public function test_can_create_book() {
        // Corresponding author must be created first
        $author = [
            'name' => $this->faker->name,
            'biography' => $this->faker->sentence,
            'birthday' => $this->faker->date('Y-m-d'),
        ];

        $this->post('/authors', $author);

        $book = [
            'title' => $this->faker->text(10),
            'description' => $this->faker->sentence,
            'publication_date' => $this->faker->date('Y-m-d'),
            'pages' => 10,
            'author_id' => 1
        ];

        $this->post('/books', $book);

        $this->assertDatabaseHas('books', $book);

        $this->get('/books')->assertSee($book['title']);
    }

    /**
     * Test books.show route
     *
     * @return void
     */
    public function test_can_show_book() {
        $this->withoutExceptionHandling();
        // Corresponding author must be created first
        $author = [
            'name' => $this->faker->name,
            'biography' => $this->faker->sentence,
            'birthday' => $this->faker->date('Y-m-d'),
        ];

        $this->post('/authors', $author);

        $book = [
            'title' => $this->faker->text(10),
            'description' => $this->faker->sentence,
            'publication_date' => $this->faker->date('Y-m-d'),
            'pages' => 10,
            'author_id' => 1
        ];

        $this->post('/books', $book);

        $this->assertDatabaseHas('books', $book);

        $response = $this->get('/books/1');

        $response->assertStatus(200);
    }

//    /**
//     * Test books.update route
//     *
//     * @return void
//     */
//    public function test_can_update_book() {
//        // Corresponding author must be created first
//        $author = [
//            'name' => $this->faker->name,
//            'biography' => $this->faker->sentence,
//            'birthday' => $this->faker->date('Y-m-d'),
//        ];
//
//        $this->post('/authors', $author);
//
//        // Create new book
//        $book = [
//            'title' => $this->faker->text(10),
//            'description' => $this->faker->sentence,
//            'publication_date' => $this->faker->date('Y-m-d'),
//            'pages' => 10,
//            'author_id' => 1
//        ];
//
//        $this->post('/books', $book);
//
//        // Update the newly created book
//        $bookUpdated = [
//            'title' => $this->faker->text(10),
//            'description' => $this->faker->sentence,
//            'publication_date' => $this->faker->date('Y-m-d'),
//            'pages' => 10,
//            'author_id' => 1
//        ];
//
//        $this->json('PUT', '/books/1', $bookUpdated);
//
//        $this->get('/books')->assertSee($bookUpdated['title']);
//    }
//
//    /**
//     * Test books.delete route
//     *
//     * @return void
//     */
//    public function test_can_delete_book() {
//        $book = [
//            'title' => $this->faker->text(10),
//            'description' => $this->faker->sentence,
//            'publication_date' => $this->faker->date('Y-m-d'),
//            'pages' => 10,
//            'author_id' => 1
//        ];
//
//        $this->post('/books', $book);
//
//        $this->assertDatabaseHas('books', $book);
//
//        $this->delete('/books/1');
//
//        $this->assertDatabaseMissing('books', $book);
//    }
}
