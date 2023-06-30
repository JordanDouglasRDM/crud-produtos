<?php

namespace Crud\PDO\Controller;

use Crud\PDO\Repository\ProdutoRepository;

class FormProdutoController implements Controller
{
    public function __construct(private ProdutoRepository $produtoRepository)
    {
    }
    public function processaRequisicao()
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        $produto = null;
        if ($id !== false && $id !== null) {
            $produto = $this->produtoRepository->find($id);
        }
        if ($produto )
        require_once __DIR__ . '/../../views/edit.php';
    }
}