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
        $response = $this->post('/books', [
           'title' => 'Cool Book Title',
           'author' => 'Yuta',
        ]);

        $book = Book::first();


        $this->assertCount(1, Book::all());
        $response->assertRedirect($book->path());
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

    /** @test */
    public function a_author_is_required()
    {
        $response = $this->post('/books', [
            'title' => 'Cool Book Title',
            'author' => '',
        ]);

        $response->assertSessionHasErrors('author');
    }

    /** @test */
    public function a_book_can_be_updated()
    {
        // 初期データをPOST
        $this->post('/books', [
            'title' => 'Cool Book Title',
            'author' => 'Yuta',
        ]);

        // DB内の一番最初のデータを変数に代入
        $book = Book::first();

        // /book+id/に上書きしたデータをPATCH
        $response = $this->patch($book->path(), [
            'title' => 'New Title',
            'author' => 'Pomu',
        ]);

        // DB内のtitleとauthorが第一引数のそれと等しいことを確認
        $this->assertEquals('New Title', Book::first()->title);
        $this->assertEquals('Pomu', Book::first()->author);
        $response->assertRedirect($book->fresh()->path());
    }

    /** @test */
    public function a_book_can_be_deleted()
    {
        // 初期データをPOST
        $this->post('/books', [
            'title' => 'Cool Book Title',
            'author' => 'Yuta',
        ]);

        // DB内の一番最初のデータを変数に代入
        $book = Book::first();
        $this->assertCount(1, Book::all());

        // /book+id/に上書きしたデータをDELETE
        $response = $this->delete($book->path());

        $this->assertCount(0, Book::all());
        $response->assertRedirect('/books');
    }
}
