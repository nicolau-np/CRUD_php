<?php
class PessoaController extends Conexao
{

    public function index()
    {
        $this->response = null;
        $this->sql = "select *from pessoas";
        try {
            $this->cmd = $this->open()->prepare($this->sql);
            $this->cmd->execute();
            if ($this->cmd) {
                $this->response = $this->cmd;
            }
            $this->close();
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
        return $this->response;
    }

    public function show($id)
    {
        $this->response = null;
        $this->sql = "select *from pessoas where id=:id";
        try {
            $this->cmd = $this->open()->prepare($this->sql);
            $this->cmd->bindValue(":id", $id, PDO::PARAM_INT);
            $this->cmd->execute();
            if ($this->cmd) {
                $this->response = $this->cmd;
            }
            $this->close();
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
        return $this->response;
    }

    public function store(Pessoa $pessoa)
    {
        $this->response = null;
        $this->sql = "insert into pessoas (nome, genero, idade) values(:nome, :genero, :idade)";
        try {
            $this->cmd = $this->open()->prepare($this->sql);
            $this->cmd->bindValue(":nome", $pessoa->getNome(), PDO::PARAM_STR);
            $this->cmd->bindValue(":genero", $pessoa->getGenero(), PDO::PARAM_STR);
            $this->cmd->bindValue(":idade", $pessoa->getIdade(), PDO::PARAM_INT);
            $this->cmd->execute();
            if ($this->cmd) {
                $this->response = "yes";
            }
            $this->close();
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
        return $this->response;
    }

    public function update(Pessoa $pessoa, $id)
    {
        $this->response = null;
        $this->sql = "update pessoas set nome=:nome, genero=:genero, idade=:idade where id=:id";
        try {
            $this->cmd = $this->open()->prepare($this->sql);
            $this->cmd->bindValue(":nome", $pessoa->getNome(), PDO::PARAM_STR);
            $this->cmd->bindValue(":genero", $pessoa->getGenero(), PDO::PARAM_STR);
            $this->cmd->bindValue(":idade", $pessoa->getIdade(), PDO::PARAM_INT);
            $this->cmd->bindValue(":id", $id, PDO::PARAM_INT);
            $this->cmd->execute();
            if ($this->cmd) {
                $this->response = "yes";
            }
            $this->close();
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
        return $this->response;
    }

    public function destroy($id)
    {
        $this->response = null;
        $this->sql = "delete from pessoas where id=:id";
        try {
            $this->cmd = $this->open()->prepare($this->sql);
            $this->cmd->bindValue(":id", $id, PDO::PARAM_INT);
            $this->cmd->execute();
            if ($this->cmd) {
                $this->response = "yes";
            }
            $this->close();
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
        return $this->response;
    }
}