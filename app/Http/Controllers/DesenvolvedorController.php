<?php

namespace App\Http\Controllers;

use App\Http\Requests\DesenvolvedorRequest;
use Illuminate\Http\JsonResponse;
use App\Models\Desenvolvedor;

/**
 * Classe responsável por controlar ações ligadas ao desenvolvedor.
 */
class DesenvolvedorController extends Controller
{
    /**
     * Método responsável por cadastrar um desenvolvedor.
     *
     * @param DesenvolvedorRequest $desenvolvedorRequest
     * @return JsonResponse
     */
    public function cadastrar(DesenvolvedorRequest $desenvolvedorRequest): JsonResponse
    {
        $desenvolvedor = new Desenvolvedor;
        $desenvolvedor->nome = $desenvolvedorRequest->nome;
        $desenvolvedor->nivel = $desenvolvedorRequest->nivel;

        if ($desenvolvedor->save() === true) {
            return response()->json([
                'mensagem' => 'Desenvolvedor cadastrado com sucesso.'
            ], 200);
        } else {
            return response()->json([
                'mensagem' => 'Erro ao cadastrar desenvolvedor.'
            ], 502);
        }
    }

    /**
     * Método responsável por editar um desenvolvedor.
     *
     * @param DesenvolvedorRequest $desenvolvedorRequest
     * @return JsonResponse
     */
    public function editar(DesenvolvedorRequest $desenvolvedorRequest): JsonResponse
    {
        $desenvolvedor = Desenvolvedor::find($desenvolvedorRequest->id);
        $desenvolvedor->nome = $desenvolvedorRequest->nome;
        $desenvolvedor->nivel = $desenvolvedorRequest->nivel;

        if ($desenvolvedor->save() === true) {
            return response()->json([
                'mensagem' => 'Desenvolvedor editado com sucesso.'
            ], 200);
        } else {
            return response()->json([
                'mensagem' => 'Erro ao editar desenvolvedor.'
            ], 502);
        }
    }

    /**
     * Método responsável por excluir um desenvolvedor.
     *
     * @param DesenvolvedorRequest $desenvolvedorRequest
     * @return JsonResponse
     */
    public function excluir(DesenvolvedorRequest $desenvolvedorRequest): JsonResponse
    {
        if (Desenvolvedor::destroy($desenvolvedorRequest->id)) {
            return response()->json([
                'mensagem' => 'Desenvolvedor excluído com sucesso.'
            ], 200);
        } else {
            return response()->json([
                'mensagem' => 'Erro ao excluir desenvolvedor.'
            ], 502);
        }
    }

    /**
     * Método responsável por resgatar um desenvolvedor.
     *
     * @param DesenvolvedorRequest $desenvolvedorRequest
     * @return JsonResponse
     */
    public function resgatar(DesenvolvedorRequest $desenvolvedorRequest): JsonResponse
    {
        $desenvolvedor = Desenvolvedor::find($desenvolvedorRequest->id);

        if ($desenvolvedor !== null) {
            return response()->json($desenvolvedor, 200);
        } else {
            return response()->json([
                'mensagem' => 'Desenvolvedor não encontrado.'
            ], 204);
        }
    }

    /**
     * Método responsável por listar todos os desenvolvedores.
     *
     * @return JsonResponse
     */
    public function listar(DesenvolvedorRequest $desenvolvedorRequest): JsonResponse
    {
        $retornoPaginate = Desenvolvedor::paginate(6);
        if ($desenvolvedorRequest->nome) {
            $retornoPaginate = Desenvolvedor::where('nome', '=', $desenvolvedorRequest->nome)->paginate(6);
        }

        if (count(Desenvolvedor::all()) > 0) {
            return response()->json($retornoPaginate, 200);
        } else {
            return response()->json([
                'mensagem' => 'Nenhum desenvolvedor no momento.'
            ], 204);
        }
    }
}
