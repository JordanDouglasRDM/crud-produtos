<?php

use Crud\PDO\Controller\{DeleteProdutoController,
    EditProdutoController,
    FormProdutoController,
    NewProdutoController,
    ProdutoListController};

return [
  'GET|/' => ProdutoListController::class,
    'POST|/novo' => NewProdutoController::class,
    'GET|/excluir' => DeleteProdutoController::class,
    'GET|/update' => FormProdutoController::class,
    'POST|/update' => EditProdutoController::class,
];