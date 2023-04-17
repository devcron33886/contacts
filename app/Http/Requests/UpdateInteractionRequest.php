<?php

namespace App\Http\Requests;

use App\Models\Interaction;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateInteractionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('interaction_edit');
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
