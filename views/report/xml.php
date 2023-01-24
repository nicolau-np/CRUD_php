<?php
include_once('./../../config/Conexao.php');
include_once('./../../model/Pessoa.php');
include_once('./../../controller/PessoaController.php');

$pessoa = new Pessoa();
$pessoaController = new PessoaController();

$index = $pessoaController->index();

$arquivo_saida = 'document.xml';

$xml = new DOMDocument('1.0');
$xml->formatOutput = true;

$pessoa = $xml->createElement('Pessoa');
while ($pessoas = $index->fetch(PDO::FETCH_OBJ)) {
    $nome = $xml->createElement('Nome', $pessoas->nome);
    $pessoa->appendChild($nome);
    $genero = $xml->createElement('Genero', $pessoas->genero);
    $pessoa->appendChild($genero);
    $idade = $xml->createElement('Idade', $pessoas->idade);
    $pessoa->appendChild($idade);
}
$xml->appendChild($pessoa);

header("Content-disposition: attachment; filename=\"{$arquivo_saida}\"");
header("Content-type: text/xml; charset=utf8");
echo $xml->saveXML();