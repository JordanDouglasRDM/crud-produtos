<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projeto CRUD</title>
<link rel="stylesheet" href="/css/inicio.css">
</head>
<body>
<style>
    .transparent-input {
        background-color: transparent;
        border: none;
        outline: none;
    }
</style>
    <script src="https://kit.fontawesome.com/9f50e2463f.js" crossorigin="anonymous"></script>
    <h1>Cadastro</h1>
    <form action="/novo" method="POST">
        <table id="tabela1">
            <tr>
                <th>
                    <label for="nome">Produto</label>
                </th>
                <td>    
                    <input type="text" name="nome" id="nome">
                </td>
            </tr>
            <tr>
                <th>
                    <label for="quant">Quantidade</label>
                </th>
                <td>
                    <input type="number" name="quant" id="quant"> 
                </td>
            </tr>
            <tr>
                <th>
                    <label for="preco">Valor do Produto</label>
                </th>
                <td>
                    <input name="preco" id="preco" type="number" step="0.01" min="0" placeholder="R$ 0,00" />
                </td>
            </tr>
        </table>
        <input type="submit" value="Incluir">
    </form>
    <table id="tabela2">
        <tr>
            <th>ID</th>
            <th>Produto</th>
            <th>Preco</th>
            <th id="col-acoes"></th>
        </tr>
        <?php
        /** @var \Crud\PDO\Entity\Produto[] $produtoList */
        foreach ($produtoList as $produto): ?>
        <tr>
            <td><?= $produto->id; ?></td>
            <td><?= $produto->nome; ?></td>
            <td><?= $produto->preco; ?></td>
            <td>
                <a href="/form?id=<?= $produto->id; ?>">
                    <i class="fa-solid fa-pen-to-square" style="color: #9c9c9c;"></i>
                </a>
                <a href="/excluir?id=<?= $produto->id; ?>">
                    <i class="fa-solid fa-trash" style="color: #ff0000;"></i>
                </a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>