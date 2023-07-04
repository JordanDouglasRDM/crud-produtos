<?php

namespace Crud\PDO\Controller;

use Crud\PDO\Entity\Produto;
use Crud\PDO\Repository\ProdutoRepository;

class EditProdutoController implements Controller
{
    public function __construct(private ProdutoRepository $produtoRepository)
    {
    }

    public function processaRequisicao()
    {

        $nome = filter_input(INPUT_POST, 'nome');
        $preco = filter_input(INPUT_POST, 'preco', FILTER_VALIDATE_FLOAT);
        $quant = filter_input(INPUT_POST, 'quant', FILTER_VALIDATE_INT);
        if (($nome || $preco || $quant) == false || ($nome || $preco || $quant) == null) {
            header('Location: /?sucesso=0');
            return;
        }
        $produto = new Produto($nome, $preco, $quant);
        $produto->setSoma();
        $sucess = $this->produtoRepository->update($produto);
        if ($sucess) {
            header('Location: /?sucesso=1');
        } else {
            header('Location: /?sucesso=0');
        }
    }
}