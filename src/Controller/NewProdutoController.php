<?php

namespace Crud\PDO\Controller;

use Crud\PDO\Entity\Produto;
use Crud\PDO\Repository\ProdutoRepository;

class NewProdutoController implements Controller
{
    public function __construct(private ProdutoRepository $produtoRepository)
    {
    }

    public function processaRequisicao(): void
    {

        $nome = filter_input(INPUT_POST,'nome');
        $preco = filter_input(INPUT_POST, 'preco',FILTER_VALIDATE_FLOAT);
        if (($nome || $preco) === false){
            header('Location: /?sucesso=0');
            exit();
        }
        $sucess = $this->produtoRepository->add(new Produto($nome, $preco));

        if ($sucess === false){
            header('Location: /?sucesso=0');
        } else {
            header('Location: /?sucesso=1');
        }
    }
}