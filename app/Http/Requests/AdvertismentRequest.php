<?php

namespace App\Http\Requests;

use App\Traits\GeneralTrait;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class AdvertismentRequest extends FormRequest
{
    use GeneralTrait;

    public function rules()
    {
        return match ($this->method()) {
            'GET' => [
                'id' => 'required|exists:App\Models\Advertisment',
            ],
            'POST' => [
                'user_id'=>'required|exists:App\Models\User',
                'advertisment_type_id'=>'required|exists:App\Models\AdvertismentType,id',
                'category_id'=>'required|exists:App\Models\Category,id',
                'tags'=>'required|exists:App\Models\Tag,id',
                'title'=>'required',
                'description'=>'required',
                'start_date'=>'required|date',


            ],
            'PUT' => [
                'id' => 'required|exists:App\Models\Advertisment',
                'advertisment_type_id'=>'required|exists:App\Models\AdvertismentType,id',
                'category_id'=>'required|exists:App\Models\Category,id',
                'tags'=>'required|exists:App\Models\Tag,id',
                'title'=>'required',
                'description'=>'required',
                'start_date'=>'required|date',
            ],
            'DELETE' => [
                'id' => 'required|exists:App\Models\Advertisment'
            ],
            default => [],
        };

    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException($this->returnError($validator->errors()->all(), 422));
    }
}
