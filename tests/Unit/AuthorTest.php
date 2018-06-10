<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Author;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthorTest extends TestCase
{
    use RefreshDatabase;
    /**
     * An add author test.
     *
     * @return void
     */
    public function testInsertAuthor()
    {

        $author = factory(Author::class)->create([
            'name' => 'foo',
            'birthday' => date('Y-m-d H:i:s'),
            'biography' => 'Foo wrote the first book.'

        ]);

        $this->assertDatabaseHas('authors', [
            'name' => 'foo',
            'birthday' => date('Y-m-d')
        ]);

    }
    /**
     * A missing author test.
     *
     * @return void
     */
    public function testMissingAuthor()
    {

        $this->assertDatabaseMissing('authors', [
            'name' => 'Richard',
        ]);

    }

}
