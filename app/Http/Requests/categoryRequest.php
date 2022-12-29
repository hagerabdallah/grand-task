<?php

namespace App\Http\Requests;

use App\Traits\GeneralTrait;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
class categoryRequest extends FormRequest
{
    use GeneralTrait;

    public function rules()
    {
        return match ($this->method()) {
            'GET' => [
                'id' => 'required|exists:App\Models\Category',
            ],
            'POST' => [
                'name' => 'required'
            ],
            'PUT' => [
                'id' => 'required|exists:App\Models\Category',
                'name' => 'required'
            ],
            'DELETE' => [
                'id' => 'required|exists:App\Models\Category'
            ],
            default => [],
        };

    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException($this->returnError($validator->errors()->all(), 422));
    }
}
