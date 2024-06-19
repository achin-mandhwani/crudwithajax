<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
class validationrules extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    // public function authorize(): bool
    // {
    //     return true;
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
            'club_id'=>'required',
            'title'=>'required|string|min:5',
            'product_title'=>'required|string|max:15',
            'type'=>'required|string|max:10',
        ];
    }

    public function failedValidation(Validator $validate){
        throw new HttpResponseException(response()->json([
            'success'=>false,
            'message' => 'validation error',
            'data' => $validate->errors()
        ]));
    }
}
