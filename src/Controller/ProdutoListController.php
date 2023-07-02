<?php

namespace Crud\PDO\Controller;

use Crud\PDO\Repository\ProdutoRepository;

class ProdutoListController implements Controller
{
    public function __construct(private ProdutoRepository $produtoRepository)
    {
    }

    public function processaRequisicao(): void
    {
        $produtoList = $this->produtoRepository->all();
        $acao = '/novo';
        $nome = null;
        require_once __DIR__ . '/../../views/initial.php';
    }
}