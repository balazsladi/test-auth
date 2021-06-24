<?php

namespace App\Http\Requests\Api\Auth;

use App\Http\Requests\FormRequest;

class SocialRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'accessToken' => 'required|string',
            'oneSignalId' => 'string|max:255',
            'options' => 'array',
            'options.username' => 'nullable|string|max:255'
        ];
    }
}