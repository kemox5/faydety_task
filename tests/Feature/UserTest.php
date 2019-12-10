<?php

namespace Tests\Feature;

use App\User;
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
        $response = $this->postJson('/api/user/register', $user);
        $response->dump();
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

}
