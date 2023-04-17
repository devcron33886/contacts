<?php

namespace App\Http\Requests;

use App\Models\Interaction;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreInteractionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('interaction_create');
    }

    public function rules()
    {
        return [
            'company_id' => [
                'required',
                'integer',
            ],
            'contact_id' => [
                'required',
                'integer',
            ],
            'files' => [
                'array',
            ],
        ];
    }
}
