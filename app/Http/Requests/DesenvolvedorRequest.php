<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DesenvolvedorRequest extends FormRequest
{
    protected array $rules;

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
            case 'api/desenvolvedor/cadastrar':
                $this->rules = [
                    'nome' => 'required|string',
                    'nivel' => 'required|string|max:1'
                ];
                break;
            case 'api/desenvolvedor/editar':
                $this->rules = [
                    'id' => 'required|integer',
                    'nome' => 'required|string',
                    'nivel' => 'required|string|max:1'
                ];
                break;
            case 'api/desenvolvedor/excluir':
            case 'api/desenvolvedor/resgatar':
                $this->rules = [
                    'id' => 'required|integer'
                ];
                break;
            case 'api/desenvolvedor/listar':
                $this->rules = [];
                break;
        }

        return $this->rules;
    }
}
