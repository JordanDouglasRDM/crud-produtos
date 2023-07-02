<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projeto CRUD</title>
    <link rel="stylesheet" href="/css/inicio.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/9f50e2463f.js" crossorigin="anonymous"></script>
    <script src="https://cdn.lordicon.com/bhenfmcm.js"></script>
</head>
<body>
<div class="d-flex justify-content-center align-items-center">
    <h1 class="display-4 text-center">
        <div class="d-flex align-items-center">
            <div>
                <lord-icon
                        src="https://cdn.lordicon.com/cllunfud.json"
                        trigger="hover"
                        colors="outline:#121331,primary:#646e78,secondary:#ebe6ef"
                        style="width:100px;height:100px"
                ></lord-icon>
            </div>
            <div class="ms-3">Carrinho de Compras</div>
        </div>
    </h1>
</div>
<div class="container col-md-5">
    <?php
    /** @var \Crud\PDO\Entity\Produto $produtoSelecionado */
    /** @var string $acao */
    ?>
    <form action="<?= $acao ;?>" method="POST">
    <div class="input-group p-2 mx-auto">
            <span class="input-group-text" id="basic-addon1">
                <i class="fa-solid fa-barcode" style="color: #07090e;"></i>
            </span>
            <input name="nome" type="text" class="form-control" autofocus
                   value="<?= isset($produtoSelecionado) ? $produtoSelecionado->nome : ''; ?>"
                   placeholder="Produto" aria-label="Username" aria-describedby="basic-addon1">
        </div>
        <div class="input-group p-2 mx-auto">
            <span class="input-group-text" id="basic-addon1">
                <i class="fa-solid fa-calculator" style="color: #000000;"></i>
            </span>
            <input name="quant" type="number" class="form-control"
                   placeholder="Quantidade" aria-label="Username" aria-describedby="basic-addon1">
        </div>
        <div class="input-group p-2 mx-auto">
            <span class="input-group-text" id="basic-addon1">
                <i class="fa-solid fa-sack-dollar" style="color: #000000;"></i>
            </span>
            <input name="preco" type="number" step="0.01" min="0" placeholder="R$ 0,00"
                   class="form-control"
                   value="<?= isset($produtoSelecionado) ? $produtoSelecionado->preco : ''; ?>"
                   aria-label="Username" aria-describedby="basic-addon1">
            <button type="submit" class="btn btn-success mx-auto"><?= isset($produtoSelecionado) ? 'Atualizar' : 'Incluir'; ?></button>
        </div>
    </form>
</div>

<div class="container p-3">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="table-wrapper">
                <table class="table table-hover table-gradient">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">Código</th>
                        <th scope="col">Produto</th>
                        <th scope="col">Preço</th>
                        <th scope="col">Ações</th>
                    </tr>
                    </thead>
                    <?php foreach ($produtoList as $produto): ?>
                        <tbody>
                        <tr>
                            <td class="col-md-1" ><?= $produto->id; ?></td>
                            <td class="col-md-4" ><?= $produto->nome; ?></td>
                            <td class="col-md-2" ><?= $produto->preco; ?></td>
                            <td id="tabela-acoes" class="col-md-1" >
                                <a style="text-decoration: none;" href="/update?id=<?= $produto->id; ?>">
                                    <i class="fa-solid fa-pen-to-square" style="color: #a8a8a8;"></i>
                                </a>
                                <a style="text-decoration: none;" id="delete-icon" href="/excluir?id=<?= $produto->id; ?>">
                                    <i class="fa-solid fa-trash" style="color: #ff0000;"></i>
                                </a>
                            </td>
                        </tr>
                        </tbody>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>
</div>
</body>
</html>