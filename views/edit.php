<?php
/** @var \Crud\PDO\Entity\Produto $produto */

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projeto CRUD</title>
    <link rel="stylesheet" href="/css/edit.css">
    <script src="https://kit.fontawesome.com/9f50e2463f.js" crossorigin="anonymous"></script>
</head>
<body>
<a href="/">
    <i class="fa-solid fa-circle-left" style="color: #ffffff;"></i>
</a>
<form action="/update" method="post">
    <input type="hidden" value="<?= $produto->id; ?>">
    <label for="nome">Produto</label><br><br>
    <input type="text" name="nome" id="nome" value="<?= $produto->nome; ?>"><br><br>
    <label for="nome">Preco</label><br><br>
    <input name="preco" id="preco" type="number" step="0.01" min="0" value="<?= $produto->preco; ?>"><br><br><br>
    <input id="button2" type="submit" value="Atualizar">
</form>
</body>
</html>