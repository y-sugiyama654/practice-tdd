<?php

namespace Tests\Feature;

use App\Author;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthorManagementTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function an_author_can_be_created()
    {
        $this->withoutExceptionHandling();

        $this->post('/author', [
            'name' => 'Author Name',
            'dob' => '01/26/2020',
        ]);

        $author = Author::all();

        $this->assertCount(1, $author);
        // dobがcarbonインスタンスであること
        $this->assertInstanceOf( Carbon::class, $author->first()->dob);
        $this->assertEquals( '2020/26/01', $author->first()->dob->format('Y/d/m'));
    }
}
