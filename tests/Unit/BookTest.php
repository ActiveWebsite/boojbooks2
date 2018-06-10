<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Book;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BookTest extends TestCase
{
    use RefreshDatabase;
    /**
     * An add book test.
     *
     * @return void
     */
    public function testInsertBook()
    {

        $book = factory(Book::class)->create([
            'title' => 'New Book',
            'publication_date' => date('Y-m-d H:i:s'),
            'description' => 'This is the first book that has been written by this author.',
            'pages' => '300',
            'author_id' => '1'
        ]);

        $this->assertDatabaseHas('authors', [
            'title' => 'New Book',
            'publication_date' => date('Y-m-d'),
            'pages' => '300'
        ]);

    }
    /**
     * A missing book test.
     *
     * @return void
     */
    public function testMissingAuthor()
    {

        $this->assertDatabaseMissing('authors', [
            'title' => 'Oldest Book',
        ]);

    }

}
