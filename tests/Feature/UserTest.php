<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    public function test_search_users_by_existing_email_should_return_200()
    {
        $response = $this->json("GET", "api/users?email=test@mail10.dk");
        $response->assertStatus(200);
    }

    public function test_search_users_by_none_existing_email_should_return_404()
    {
        $response = $this->json("GET", "api/users?email=test123@mail100.dk");
        $response->assertStatus(404);
    }


    public function test_get_all_users_endpoint_should_return_200()
    {
        $response = $this->json("GET", "api/users");
        $response->assertStatus(200);
    }
}
