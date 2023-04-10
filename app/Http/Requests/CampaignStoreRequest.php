<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CampaignStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'channel' => 'required|max:255',
            'source' => 'required|max:255',
            'campaign_name' => 'required|max:255',
            'target_url' => 'required|max:255',
            'user_id' => 'required',
        ];
    }
}
