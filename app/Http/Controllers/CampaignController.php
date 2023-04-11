<?php

namespace App\Http\Controllers;

use App\Http\Requests\CampaignStoreRequest;
use App\Http\Resources\CampaignResource;
use App\Models\Campaign;
use Illuminate\Http\Request;

class CampaignController extends Controller
{


    /**
     *
     * @param Request $request
     * @return void
     */
    public function index(Request $request)
    {
        // Check if page_size is present otherwise default to 20 
        $pageSize = $request->page_size ?? 20;
        // Order by query params
        $campaignColumName = $request->campaign_order_by ?? "id";
        $inputColumName = $request->input_order_by ?? "campaign_name";
        $sortOrder = $request->sort_order ??  "DESC";
        // Get Paginated campaigns eager load input relationships 
        $campaigns = Campaign::with("inputs")->orderBy($campaignColumName, $sortOrder)->paginate($pageSize);
        // Return json response
        return CampaignResource::collection($campaigns);
    }
    /**
     *
     * @param CampaignStoreRequest $request
     * @return void
     */
    public function store(CampaignStoreRequest $request)
    {
        // Check that request data is valid
        if ($request->validated()) {
            // Insert new campaign to database
            $campaign = Campaign::create([
                "user_id" => $request->user_id
            ]);

            // Create input
            $campaign->inputs()->create([
                "channel" => $request->channel,
                "source" => $request->source,
                "campaign_name" => $request->campaign_name,
                "target_url" => $request->target_url,
            ]);

            // return json
            return new CampaignResource($campaign->load('inputs'));
        }
    }
}
