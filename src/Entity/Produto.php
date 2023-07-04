<?php

namespace Crud\PDO\Entity;

use http\Exception\InvalidArgumentException;

class Produto
{
    public readonly float $preco;
    public readonly int $quant;
    public float $soma;
    public readonly int $id;

    public function __construct(
        public readonly string $nome,
        float $preco,
        int $quant,
    )
    {
        $this->setPreco($preco);
        $this->setQuant($quant);
        $this->setSoma();
    }

    private function setPreco(float $preco)
    {
        $validaIn = filter_input(INPUT_POST, 'preco', FILTER_VALIDATE_FLOAT);
        if ($validaIn === false || $validaIn < 0) {
            throw new InvalidArgumentException();
        }
        $this->preco = $preco;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function setQuant(int $quant)
    {
        $validaIn = filter_input(INPUT_POST, 'quant', FILTER_VALIDATE_INT);
        if ($validaIn === false || $validaIn < 0) {
            throw new InvalidArgumentException();
        }
        $this->quant = $quant;
    }
    public function setSoma()
    {
        $this->soma = $this->quant * $this->preco;
    }
}