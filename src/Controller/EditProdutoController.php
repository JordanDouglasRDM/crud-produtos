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
        if ($nome === false) {
            header('Location: /?sucesso=0');
            return;
        }
        $preco = filter_input(INPUT_POST, 'preco', FILTER_VALIDATE_FLOAT);
        if ($preco === false) {
            header('Location: /?sucesso=0');
            return;
        }
        $produto = new Produto($nome, $preco);
        $sucess = $this->produtoRepository->update($produto);
        if ($sucess) {
            header('Location: /?sucesso=1');
        } else {
            header('Location: /?sucesso=0');
        }
    }
}