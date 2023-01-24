<?php
class Conexao
{

    //atributos protegidos
    protected $view;
    protected $cmd;
    protected $sql;
    protected $response;
    protected $base_dados = "crud_php";

    //atributos privados
    private $conn;
    private $type = "mysql";
    private $server = "localhost";
    private $port = "3306";
    private $user = "root";
    private $password = "Np@2015b";

    //evitar clonagem 
    private function __clone()
    {
    }

    //abrir a conexao com o banco
    public function open()
    {
        try {
            $this->conn = new PDO($this->type . ":host=" . $this->server . ";port=" . $this->port . ";dbname=" . $this->base_dados, $this->user, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $ex) {
            echo 'e' . $ex;
        }
        return $this->conn;
    }

    //fechar a conexao com o banco
    public function close()
    {
        try {
            $this->conn = null;
        } catch (PDOException $ex) {
            echo 'e' . $ex;
        }
        return $this->conn;
    }
}