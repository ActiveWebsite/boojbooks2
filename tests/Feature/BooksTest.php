<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BooksTest extends TestCase
{
    use DatabaseMigrations;
    
    public function user_can_add_books()
    {
        //Given we have an authenticated user
        $this->actingAs(factory('App\Book')->create());

        // and a task object        
        $task = factory('App\Book')->make();

        //When user submits a new book
        $this->post('/books',$task->toArray());
        
        //Book should be stored in database
        $this->assertEquals(1,Task::all()->count());
    }
    
}
