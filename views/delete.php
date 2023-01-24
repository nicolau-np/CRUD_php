<?php
include_once('./../config/Conexao.php');
include_once('./../model/Pessoa.php');
include_once('./../controller/PessoaController.php');
$pessoa = new Pessoa();
$pessoaController = new PessoaController();

$id = $_GET['id'];

if ($pessoaController->destroy($id)) {
    echo '<script>'
        . 'window.location.href="./../index.php?delete";'
        . '</script>';
}