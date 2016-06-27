<?php

namespace Alfa;
class SGBD implements Abstracao\SGBD {
    private $endereco;
    private $porta;
    private $senha;
    private $usuario;
    
    public function getEndereco() {
        return $this->endereco;
    }
    
    public function setEndereco($endereco) {
        $this->endereco = $endereco;
        return $this;
    }

    public function getPorta() {
        return $this->porta;
    }
    
    public function setPorta($porta) {
        $this->porta = $porta;
        return $this;
    }

    public function getSenha() {
        return $this->senha;
    }
    
    public function setSenha($senha) {
        $this->senha = $senha;
        return $this;
    }

    public function getUsuario() {
        return $this->usuario;
    }

    public function setUsuario($usuario) {
        $this->usuario = $usuario;
        return $this;
    }

}