<?php

namespace Crud\PDO\Repository;

use Crud\PDO\Entity\Produto;
use PDO;
class ProdutoRepository
{
    public function __construct(private PDO $pdo)
    {
    }

    public function add(Produto $produto): bool
    {
        $sql = 'INSERT INTO produtos (nome, preco) VALUES (:nome, :preco)';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':nome', $produto->nome);
        $stmt->bindValue(':preco', $produto->preco);

        $id = $this->pdo->lastInsertId();
        $produto->setId(intval($id));

        $result = $stmt->execute();
        return $result;

    }

    public function remove(int $id): bool
    {
        $sql = 'DELETE FROM produtos WHERE id = ?';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(1,$id, PDO::PARAM_INT);

        $result = $stmt->execute();
        return $result;
    }

    /** @return Produto[] */
    public function all(): array
    {
        $produtosList = $this->pdo
            ->query('SELECT * FROM produtos;')
            ->fetchAll(\PDO::FETCH_ASSOC);
        return array_map(
            $this->hydrateProduto(...),
            $produtosList
        );
    }

    private function hydrateProduto(array $produtosData): Produto
    {
        $produto = new Produto($produtosData['nome'], $produtosData['preco']);
        $produto->setId($produtosData['id']);
        return $produto;
    }

    public function find(int $id): Produto
    {
        $sql = 'SELECT * FROM produtos WHERE id = ?';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(1, $id,PDO::PARAM_INT);
        $stmt->execute();

        return $this->hydrateProduto($stmt->fetch(PDO::FETCH_ASSOC));
    }

    public function update(Produto $produto): bool
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        if ($id !== false && $id !== null) {
            $sql = 'UPDATE produtos SET nome = :nome, preco = :preco WHERE id = :id;';
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->bindValue(':nome', $produto->nome,);
            $stmt->bindValue(':preco', $produto->preco);
            $result = $stmt->execute();
        } else {
            $result = false;
        }
        return $result;
    }
}