<?php
include_once('./../../assets/mpdf/mpdf.php');
include_once('./../../config/Conexao.php');
include_once('./../../model/Pessoa.php');
include_once('./../../controller/PessoaController.php');
$pessoa = new Pessoa();
$pessoaController = new PessoaController();

$pessoas = $pessoaController->index();

$html = "<!DOCTYPE html>";
$html .= "<html>
<head>
<title></title>
</head>
<body>
<table border=1>
<thead>
<tr>
<th>#</th>
<th>Nome</th>
<th>Genero</th>
<th>Idade</th>
</tr>
</thead>
<tbody>
";

while ($pessoa = $pessoas->fetch(PDO::FETCH_OBJ)) {
    $html .= '
<tr>
 <td>' . $pessoa->id . '</td>
<td>' . $pessoa->nome . '</td>
<td>' . $pessoa->genero . '</td>
<td>' . $pessoa->idade . '</td>

</tr>
';
}

$html .= '
</tbody>
</table>
</body>

</html>';

$mpdf = new mPDF();

$mpdf->WriteHTML($html);

$mpdf->Output();

exit;