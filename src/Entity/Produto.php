<?php

namespace Crud\PDO\Entity;

use http\Exception\InvalidArgumentException;

class Produto
{
    public readonly float $preco;
    public readonly int $id;

    public function __construct(
        public readonly string $nome,
        float $preco,
    )
    {
        $this->setPreco($preco);
    }

    private function setPreco(float $preco)
    {
        if (filter_input(INPUT_POST, 'preco', FILTER_VALIDATE_FLOAT) === false){
            throw new InvalidArgumentException();
        }
        $this->preco = $preco;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }
}