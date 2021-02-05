<?php

namespace Tests\Unit;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic unit test example.
     *
     * @return void
     */


    /** @test */
    public function test_user_cannot_view_a_login_form_when_authenticated()
    {
        $user = factory(User::class)->make();
        $response = $this->actingAs($user)->get('/login');
        $response->assertRedirect('/home');
    }


    /** @test */
    public function test_user_can_login_with_correct_credentials()
    {
        $user = factory(User::class)->create([
            'password' => bcrypt($password = 'i-love-laravel'),
        ]);
        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => $password,
        ]);
        $response->assertRedirect('/classroom');
        $this->assertAuthenticatedAs($user);
    }


    /** @test */
    public function test_user_cannot_login_with_incorrect_password()
    {
        $user = factory(User::class)->create([
            'password' => bcrypt('i-love-laravel'),
        ]);

        $response = $this->from('/login')->post('/login', [
            'email' => $user->email,
            'password' => 'invalid-password',
        ]);

        $response->assertRedirect('/login');
        $response->assertSessionHasErrors('email');
        $this->assertGuest();
    }

    /** @test */
    public function test_user_register_with_valid_information()
    {
       $response = $this->json('post', '/register',
           [
               'name' => 'saif',
               'email' => 'saif@gmail.com',
               'password' => '123456',
               'password_confirmation' => '123456',
           ]);
       $response->assertStatus(302);
    }

    /** @test */
    public function test_user_register_with_invalid_email()
    {
        $response = $this->json('post', '/register',
            [
                'name' => 'saif',
                'email' => 'saif',
                'password' => '123456',
                'password_confirmation' => '123456',
            ]);
        $response->assertStatus(422);
    }
    /** @test */
    public function test_user_register_with_invalid_password()
    {
        $response = $this->json('post', '/register',
            [
                'name' => 'saif',
                'email' => 'saif@gmail.com',
                'password' => '12345',
                'password_confirmation' => '12345',
            ]);
        $response->assertStatus(422);
    }

    /** @test */
    public function test_user_register_with_unmatched_password()
    {
        $response = $this->json('post', '/register',
            [
                'name' => 'saif',
                'email' => 'saif@gmail.com',
                'password' => '123456',
                'password_confirmation' => '12345',
            ]);
        $response->assertStatus(422);
    }

    /** @test */
    public function test_create_classroom_with_valid_information()
    {
        $user = factory(User::class)->make();
        $response1 = $this->actingAs($user);
        $response = $this->json('post', '/classroom',
            [
                'name' => 'CSE435',
                'section' => '1',
                'subject' => 'SQA',
                'room' => '107',
                'slug' => 'ojkogtfrdsweguj',
                'user_id' => '1',
            ]);
        $response->assertStatus(500);

    }
    /** @test */
    public function test_create_classroom_with_invalid_information()
    {
        $user = factory(User::class)->make();
        $response1 = $this->actingAs($user);
        $response = $this->json('post', '/classroom',
            [
                'name' => '',
                'section' => '',
                'subject' => '',
                'room' => '',
                'slug' => 'ojkogtfrdsweguj',
                'user_id' => '1',
            ]);
        $response->assertStatus(500);

    }

    /** @test */
    public function test_join_classroom_with_valid_classroom_id()
    {
        $user = factory(User::class)->make();
        $response1 = $this->actingAs($user);
        $response = $this->json('post', '/classroom-add',
            [
                'classroom' => 'cse_435',
            ]);
        $response->assertStatus(500);
    }

}
