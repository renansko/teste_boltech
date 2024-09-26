<?php

namespace App\Http\Requests;

use App\TipoContatoEnum;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rules\Enum;

class ClientContatoRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'tipo' => ['required', new Enum(TipoContatoEnum::class)],
            'valor' => 'required',
            'principal' => 'required|boolean',
            'client_id' => 'required',
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
            'tipo.required' => 'O campo tipo e necessario',
            'valor.required' => 'O campo valor é necessario',
            'principal.required' => 'O campo principal é necessario',
            'principal.boolean' => 'O campo principal deve ser booleano',
            'client_id.required' => 'O campo client_id é necessario',
            'tipo.Illuminate\Validation\Rules\Enum' => 'campo tipo deve ser um dos seguintes valores: telefone, email ou outros',
        ];
    }
}
