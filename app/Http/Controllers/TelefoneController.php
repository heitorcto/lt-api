<?php

namespace App\Http\Controllers;

use App\Http\Requests\TelefoneRequest;
use App\Models\Telefone;
use Illuminate\Http\JsonResponse;

/**
 * Classe responsável por controlar ações ligadas ao(s) telefone(s) do desenvolvedor.
 */
class TelefoneController extends Controller
{
    /**
     * Método responsável por cadastrar um telefone
     *
     * @param TelefoneRequest $telefoneRequest
     * @return JsonResponse
     */
    public function cadastrar(TelefoneRequest $telefoneRequest): JsonResponse
    {
        $telefone = new Telefone;
        $telefone->telefone = $telefoneRequest->telefone;
        $telefone->id_desenvolvedor = $telefoneRequest->id_desenvolvedor;

        if($telefone->save() === true) {
            return response()->json([
                'mensagem' => 'Telefone cadastrado com sucesso.'
            ]);
        } else {
            return response()->json([
                'mensagem' => 'Erro ao cadastrar com sucesso.'
            ], 502);
        }
    }

    /**
     * Método responsável por editar um telefone
     *
     * @param TelefoneRequest $telefoneRequest
     * @return JsonResponse
     */
    public function editar(TelefoneRequest $telefoneRequest): JsonResponse
    {
        $telefone = Telefone::find($telefoneRequest->id);
        $telefone->telefone = $telefoneRequest->telefone;
        $telefone->id_desenvolvedor = $telefoneRequest->id_desenvolvedor;

        if($telefone->save() === true) {
            return response()->json([
                'mensagem' => 'Telefone editado com sucesso.'
            ]);
        } else {
            return response()->json([
                'mensagem' => 'Erro ao editar telefone.'
            ], 502);
        }
    }

    /**
     * Método responsável por excluir um telefone.
     *
     * @param TelefoneRequest $telefoneRequest
     * @return JsonResponse
     */
    public function excluir(TelefoneRequest $telefoneRequest): JsonResponse
    {
        if (Telefone::destroy($telefoneRequest->id)) {
            return response()->json([
                'mensagem' => 'Telefone excluído com sucesso.'
            ], 200);
        } else {
            return response()->json([
                'mensagem' => 'Erro ao excluir telefone.'
            ], 502);
        }
    }

    /**
     * Método responsável por resgatar um telefone.
     *
     * @param TelefoneRequest $telefoneRequest
     * @return JsonResponse
     */
    public function resgatar(TelefoneRequest $telefoneRequest): JsonResponse
    {
        $telefone = Telefone::find($telefoneRequest->id);

        if ($telefone !== null) {
            return response()->json($telefone, 200);
        } else {
            return response()->json([], 204);
        }
    }

    /**
     * Método responsável por listar os telefones.
     *
     * @return JsonResponse
     */
    public function listar(TelefoneRequest $telefoneRequest): JsonResponse
    {
        if (count(Telefone::all()) > 0) {
            return response()->json(Telefone::where('id_desenvolvedor', '=', $telefoneRequest->id_desenvolvedor)->paginate(4), 200);
        } else {
            return response()->json([], 204);
        }
    }
}
