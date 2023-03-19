<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TelefoneRequest extends FormRequest
{
    protected array $rules;
    protected array $messages;

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        switch ($this->path()) {
            case 'api/telefone/cadastrar':
                $this->rules = [
                    'telefone' => 'required|min:15|string|unique:telefones,telefone',
                    'id_desenvolvedor' => 'required|integer'
                ];
                break;
            case 'api/telefone/editar':
                $this->rules = [
                    'id' => 'required|integer',
                    'telefone' => 'required|string',
                    'id_desenvolvedor' => 'required|integer|unique:telefones,telefone,except,id'
                ];
                break;
            case 'api/telefone/excluir':
            case 'api/telefone/resgatar':
                $this->rules = [
                    'id' => 'required|integer',
                ];
                break;
            case 'api/telefone/listar':
                $this->rules = [
                    'id_desenvolvedor' => 'required|integer',
                ];
                break;
        }

        return $this->rules;
    }

    public function messages()
    {
        return [
            'telefone.unique' => 'Esse telefone já está em uso.'
        ];
    }
}
