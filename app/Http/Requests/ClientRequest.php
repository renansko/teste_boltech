<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ClientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'errors' => $validator->errors()
        ], 422));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|min:4',
            'document' => 'required|min:11|max:14|unique:clients',
            'telefone' => 'required',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'O nome e necessario',
            'telefone.required' => 'O telefone é necessario',
            'document.required' => 'O document é necessario',
            'document.min' => 'Deve conter o minimo 11 caracteres',
            'document.max' => 'Deve ter no maximo 14 caracteres',
            'document.unique' => 'O documento deve ser unico',
            'name.min' => 'O nome deve ter no minimo 4 caracteres',
        ];
    }
}
