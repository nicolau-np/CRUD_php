<?php
include_once('./config/Conexao.php');
include_once('./model/Pessoa.php');
include_once('./controller/PessoaController.php');
$pessoa = new Pessoa();
$pessoaController = new PessoaController();
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
            <a href="index.php">Home</a>
        </nav>
    </header>

    <main>

        <?php
        $pessoas = $pessoaController->index();

        if (isset($_GET['delete'])) {
            echo "Eliminado com sucesso";
        }

        if (isset($_GET['update'])) {
            echo "Actualizado com sucesso";
        }

        if (isset($_POST['btn_save'])) {
            $nome = $_POST['nome'];
            $genero = $_POST['genero'];
            $idade = $_POST['idade'];

            $pessoa->setNome($nome);
            $pessoa->setGenero($genero);
            $pessoa->setIdade($idade);
            $response = $pessoaController->store($pessoa);
            if ($response) {
                echo "Cadastro Feito com sucesso!";
                $pessoas = $pessoaController->index();
            }
        }
        ?>

        <div class="form">
            <form action="index.php" method="POST">
                <input type="text" name="nome" id="" placeholder="Nome" /><br />
                <select name="genero">
                    <option value="" hidden>Genero</option>
                    <option value="M">M</option>
                    <option value="F">F</option>
                </select><br />
                <input type="number" name="idade" id="" placeholder="Idade" /><br />
                <button type="submit" name="btn_save">Salvar</button>
            </form>
        </div>

        <div class="table">
            <a href="./views/report/report.php">RELATÓRIO PDF</a>
            &nbsp; &nbsp;
            <a href="./views/report/xml.php">RELATÓRIO XML</a>
            <br />
            <table border="1">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th>Genero</th>
                        <th>Idade</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($pessoa = $pessoas->fetch(PDO::FETCH_OBJ)) {
                    ?>
                    <tr>
                        <td><?php echo $pessoa->id; ?></td>
                        <td><?php echo $pessoa->nome; ?></td>
                        <td><?php echo $pessoa->genero; ?></td>
                        <td><?php echo $pessoa->idade; ?></td>
                        <td>
                            <a href="./views/show.php?id=<?php echo $pessoa->id; ?>">Detalhes</a>
                            &nbsp;
                            <a href="./views/edit.php?id=<?php echo $pessoa->id; ?>">Editar</a>
                            &nbsp;
                            <a href="./views/delete.php?id=<?php echo $pessoa->id; ?>">Eliminar</a>
                        </td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>



    </main>
</body>

</html>