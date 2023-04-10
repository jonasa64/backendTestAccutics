<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CampaignTest extends TestCase
{


    public function test_campaigns_get_all_endpoint_should_return_200_ok()
    {
        $response = $this->json("GET", "api/campaigns");
        $response->assertStatus(200);
    }

    public function test_post_campaign_endpoint_returns_201()
    {

        $response = $this->json("POST", "api/campaigns", [
            "channel" => "test channel",
            "source" => "test source",
            "campaign_name" => "test campaign",
            "target_url" => "test_target_url",
            "user_id" => 7
        ]);

        $response->assertStatus(201);
    }


    public function test_post_campaign_endpoint_with_missing_data_should_return_status_422()
    {

        $response = $this->json("POST", "api/campaigns", [
            "channel" => "test channel",
            "source" => "test source",
            "user_id" => 7
        ]);

        $response->assertStatus(422);
    }
}
