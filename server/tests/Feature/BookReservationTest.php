<?php

namespace Tests\Feature;

use App\Book;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BookReservationTestTest extends TestCase
{

    use  RefreshDatabase;

    /** @test */
    public function a_book_can_be_added_to_the_library()
    {
        $this->withoutExceptionHandling();
        $response = $this->post('/books', [
           'title' => 'Cool Book Title',
           'author' => 'Yuta',
        ]);

        // responseが200のステータスコードを持っている
        $response->assertOk();
        $this->assertCount(1, Book::all());
    }

    /** @test */
    public function a_title_is_required()
    {
        $response = $this->post('/books', [
            'title' => '',
            'author' => 'Yuta',
        ]);

        $response->assertSessionHasErrors('title');
    }

}
