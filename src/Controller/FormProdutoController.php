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
        $produtoList = $this->produtoRepository->all();

        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        $produto = null;
        if ($id !== false && $id !== null) {
            $produtoSelecionado = $this->produtoRepository->find($id);
        }
        if ($produtoSelecionado)
        $acao = '/update?id=' . $id;
        require_once __DIR__ . '/../../views/initial.php';
    }
}