<?php

namespace App\Http\Requests;

use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Foundation\Http\FormRequest;

class ShippingRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'user_id' => 'required|exists:App\User,id',
            'street_one' => 'required|min:4|max:99',
            'street_two' => 'min:4|max:99',
            'addres' => 'required|min:4|max:199',
            'suburb' => 'required|min:4|max:79',
            'town' => 'required|min:4|max:79',
            'state' => 'required|min:4|max:39',
            'country' => 'required|min:4|max:19',
            'postal_code' => 'required|min:5|max:6',
            'status' => 'boolean'
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $errors = (new ValidationException($validator))->errors();
        
        throw new HttpResponseException(
            response()->json(
                [
                    'errors' => $errors
                ],
                JsonResponse::HTTP_UNPROCESSABLE_ENTITY
            )
        );
    }
}
