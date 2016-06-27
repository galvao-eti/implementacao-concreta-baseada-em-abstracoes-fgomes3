<?php

namespace Alfa;

class Entidade implements \Alfa\Abstracao\Entidade {
    
    private $nome;
     
    public function __construct(BaseDeDados $db) {
        $this->db = $db;
    }
    
     public function getNome() {
        return $this->nome;
    }
    public function setNome($nome) {
        $this->nome = $nome;
    }
    
    public function create($colunas, $valores) {
        $sql = "insert into " . $this->getNome() . " (" . implode(',', $colunas).") values ('" . implode("','", $valores) . "')";
        if (!mysqli_query($this->db->conexao, $sql)) {
            throw new \Exception(mysqli_error($this->db->conexao));
        } else {
            echo "Dados gravados com sucesso";
        }
    }

    public function delete($clausula) {
        $sql = "delete from " . $this->getNome() . " where " .$clausula;
        if (!mysqli_query($this->db->conexao, $sql)) {
            throw new \Exception(mysqli_error($this->db->conexao));
        } else {
            echo "Dados deletados com sucesso";
        }
    }

    public function retrieve($colunas, $clausula) {
        $where = "";
        if($clausula != "") {
            $where = " where " . $clausula;
        }
        
        $sql = "select " . implode(", ", $colunas) . " from " . $this->getNome() . $where;
        
        $result = mysqli_query($this->db->conexao, $sql);

        if (!$result) {
            echo "Não foi possível consultar: ($sql)" . mysqli_error();
            exit;
        }

        if (mysqli_num_rows($result) == 0) {
            echo "Linhas não encontradas";
            exit;
        }
        
        $rows = mysqli_fetch_all($result);
        
        return $rows;
    }

    public function update($colunas, $valores, $clausula) {
        $novo = array_combine($colunas, $valores);
        $update = array();
        foreach ($novo as $key => $value) {
            $update[] = $key . " = '" . $value . "'";
        }
        
        $sql = "update produto set " . implode(", ", $update) . " where " . $clausula;
        if (!mysqli_query($this->db->conexao, $sql)) {
            throw new \Exception(mysqli_error($this->db->conexao));
        } else {
            echo "Dados alterados com sucesso";
        }
    }

}