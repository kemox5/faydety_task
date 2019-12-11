<?php

namespace Tests\Feature;

use App\Libraries\JwtLibrary;
use App\User;
use Firebase\JWT\JWT;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;


class UserTest extends TestCase
{
    /**
     * Test if register api is exists
     *
     * @return void
     */
    public function test_register_route_is_exist_and_work()
    {
        $user = factory(User::class)->make()->toArray();
        $response = $this->post('/api/user/register', $user);
        $response->assertCreated();
    }

    public function test_register_is_storing_in_database()
    {
        $user = factory(User::class)->make()->toArray();
        $response = $this->postJson('/api/user/register', $user);
        $this->assertDatabaseHas('users', $user);
    }

    public function test_if_register_validation_is_working()
    {
        $user = [];
        $response = $this->postJson('/api/user/register', $user);
        $response->assertJsonValidationErrors(['first_name', 'last_name', 'country_code', 'phone_number', 'gender', 'birthdate', 'avatar']);
    }

    public function test_encode_validation()
    {
        $input = [];
        $response = $this->postJson('/api/user/encode', $input);
        $response->assertJsonValidationErrors(['password', 'phone_number']);
    }

    public function test_decode()
    {
        $token = ['token' => 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJwYXNzd29yZCI6InBhc3N3b3JkIiwicGhvbmVfbnVtYmVyIjoiMDExMTk0OTQwOTgifQ.PQB1w5YvlQ73vYo4se96CVcyDB4q_I7Okl0dsZQUvvI'];
        $response = $this->postJson('/api/user/decode', $token);
        $response->assertJsonStructure(['data' => []]);
    }

    public function test_decode_wrong_token()
    {
        $token = ['token' => 'eyJwYXNzd29yZCI6InBhc3N3b3JkIiwicGhvbmVfbnVtYmVyIjoiMDExMTk0OTQwOTgifQ.PQB1w5YvlQ73vYo4se96CVcyDB4q_I7Okl0dsZQUvvI'];
        $response = $this->postJson('/api/user/decode', $token);
        $response->assertJson(["errors" => "unauthorized request"]);
    }

}
