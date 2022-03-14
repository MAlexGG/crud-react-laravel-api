<?php

namespace Tests\Feature;


use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

/* use Tests\TestCase;
use App\Models\Card;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Http\Testing\FileFactory;
use Illuminate\Http\Testing;
use Illuminate\Http\Testing\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase; */


class CardTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    use RefreshDatabase;

    public function test_if_userAuth_can_see_list_cards()
    {
        $user = User::factory()->create();;
        Auth::login($user);

        $response = $this->get('/api/cards');
        
        $response->assertStatus(200);
    }

    public function test_if_userAuth_can_create_a_card()
    {

        Storage::fake('avatars');

        $file = UploadedFile::fake()->image('avatar.jpg');

        $response = $this->post('/api/crud', [
            'avatar' => $file,
        ]);

        
        Storage::disk('avatars')->exists($file->hashName());

        /* $this->withoutExceptionHandling();

        $user = User::factory()->create();;
       // Auth::login($user);

        Storage::fake('local');


        $response = $this->post('/api/cards', [
            'title' => 'new_title',
            'image' => UploadedFile::fake()->image('avatar.jpeg', 10, 10)
        ]); */

        /* self::assertFileExists('storage/public/img/avatar.jpg');

        dd(Storage::disk('local'));
        $response->assertJsonCount(1, Card::all());
        
        Storage::disk('local')->exists('avatar.jpg'); */

        /* $response
        ->assertStatus(201)
        ->assertJson([
            'msg' => 'Card saved correctly',
        ]); */
    }

    


}
