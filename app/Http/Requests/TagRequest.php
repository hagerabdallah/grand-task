<?php

namespace App\Http\Requests;

use App\Traits\GeneralTrait;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class TagRequest extends FormRequest
{
    use GeneralTrait;

    public function rules()
    {
        return match ($this->method()) {
            'GET' => [
                'id' => 'required|exists:App\Models\Tag',
            ],
            'POST' => [
                'name' => 'required'
            ],
            'PUT' => [
                'id' => 'required|exists:App\Models\Tag',
                'name' => 'required'
            ],
            'DELETE' => [
                'id' => 'required|exists:App\Models\Tag'
            ],
            default => [],
        };

    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException($this->returnError($validator->errors()->all(), 422));
    }
}
