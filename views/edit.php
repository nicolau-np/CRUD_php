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

        <?php
        if (isset($_POST['btn_save'])) {
            $id = $_POST['id'];
            
            $nome = $_POST['nome'];
            $genero = $_POST['genero'];
            $idade = $_POST['idade'];

            $pessoa->setNome($nome);
            $pessoa->setGenero($genero);
            $pessoa->setIdade($idade);

            $response = $pessoaController->update($pessoa, $id);
            if ($response == "yes") {
                echo '<script>'
                    . 'window.location.href="./../index.php?update";'
                    . '</script>';
            }
        }
        ?>

        <div class="form">
            <form action="edit.php" method="POST">
                <input type="hidden" name="id" id="" placeholder="Nome" value="<?php echo $id;?>" /><br />
                <input type="text" name="nome" id="" placeholder="Nome" value="<?php echo $pessoas->nome; ?>" /><br />
                <select name="genero">
                    <option value="<?php echo $pessoas->genero; ?>"><?php echo $pessoas->genero ?></option>
                    <option value=" M">M</option>
                    <option value="F">F</option>
                </select><br />
                <input type="number" name="idade" id="" placeholder="Idade"
                    value="<?php echo $pessoas->idade; ?>" /><br />
                <button type="submit" name="btn_save">Salvar</button>
            </form>
        </div>


    </main>
</body>

</html>