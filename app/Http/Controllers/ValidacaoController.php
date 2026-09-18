<?php

namespace App\Http\Controllers;

use App\Models\Associacao;
use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Writer\PngWriter;
use Illuminate\Http\Response;
use Illuminate\View\View;

class ValidacaoController extends Controller
{
    public function validar(string $codigo): View
    {
        $associacao = Associacao::with('associado')
            ->where('codigo_validacao', $codigo)
            ->firstOrFail();

        $ativa = $associacao->status === 'ativa'
            && $associacao->data_fim->isFuture();

        return view('validar', [
            'associacao' => $associacao,
            'ativa' => $ativa,
        ]);
    }

    public function qr(string $codigo): Response
    {
        $associacao = Associacao::where(
            'codigo_validacao',
            $codigo
        )->firstOrFail();

        $url = route('validar', [
            'codigo' => $associacao->codigo_validacao,
        ]);

        $result = new Builder(
            writer: new PngWriter(),
            data: $url,
            size: 300,
            margin: 10,
        );

        $result = $result->build();

        return response(
            $result->getString(),
            200,
            ['Content-Type' => 'image/png']
        );
    }
    public function carteirinha(string $codigo): View
    {
        $associacao = Associacao::with('associado')
            ->where('codigo_validacao', $codigo)
            ->firstOrFail();

        return view('carteirinha', [
            'associacao' => $associacao,
        ]);
    }
}
