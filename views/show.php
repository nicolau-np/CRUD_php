<?php

include_once('./../config/Conexao.php');
include_once('./../model/Pessoa.php');
include_once('./../controller/PessoaController.php');
$pessoa = new Pessoa();
$pessoaController = new PessoaController();

if ($_GET['id']) {
    $id = $_GET['id'];
    $_SESSION['id'] = $_GET['id'];
} else {
    $id = $_SESSION['id'];
}
$show = $pessoaController->show($id);
$pessoas = $show->fetch(PDO::FETCH_OBJ);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD [php]</title>
</head>

<body>
    <header>
        <nav>
            <a href="./../index.php">Home</a>
        </nav>
    </header>

    <main>
        <br />
        <div class="profile">
            <b>ID:</b> <?php echo $pessoas->id;?><br />
            <b>Nome:</b> <?php echo $pessoas->nome;?><br />
            <b>Genero:</b> <?php echo $pessoas->genero;?><br />
            <b>Idade:</b> <?php echo $pessoas->idade;?><br />
        </div>

    </main>
</body>

</html>