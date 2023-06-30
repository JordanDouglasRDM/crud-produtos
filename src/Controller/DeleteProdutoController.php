<?php

namespace Crud\PDO\Controller;

use Crud\PDO\Repository\ProdutoRepository;

class DeleteProdutoController implements Controller
{
    public function __construct(private ProdutoRepository $produtoRepository)
    {
    }

    public function processaRequisicao()
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        if ($id !== false) {
            $sucess = $this->produtoRepository->remove($id);
            if ($sucess === true) {
                header('Location: /?sucesso=1');
            } else {
                header('Location: /?sucesso=0');
            }
        } else {
            header('Location: /?sucesso=0');
        }
    }
}