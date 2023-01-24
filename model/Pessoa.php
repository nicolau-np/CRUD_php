<?php
class Pessoa
{
  
    private $nome;
    private $genero;
    private $idade;

    
   
    public function getNome()
    {
        return $this->nome;
    }
    public function getGenero()
    {
        return $this->genero;
    }
    public function getIdade()
    {
        return $this->idade;
    }


    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function setGenero($genero)
    {
        $this->genero = $genero;
    }

    public function setIdade($idade)
    {
        $this->idade = $idade;
    }
}