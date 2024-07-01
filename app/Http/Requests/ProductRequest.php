<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validaton\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    protected function faillValidation(Validator $validator){
        throw new HttpResponseException(response()->json([
            'status'=>false,
            'error'=> $validator->errors(),
        ],422));
    }


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {     

        return [
            'name' => 'required|max:255',
            'description' => 'required|max:255',
            'price' => 'required',            
        ];
    }
}
