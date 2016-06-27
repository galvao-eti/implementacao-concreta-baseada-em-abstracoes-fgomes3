<?php

require '../autoload.php';

use Alfa\SGBD;
use Alfa\BaseDeDados;

$servidor = new SGBD;

$servidor->setEndereco("127.0.0.1");

$servidor->setPorta(3306);

$servidor->setUsuario("root");

$servidor->setSenha("");

//------------------------------------------------------------------------------

$db = new BaseDeDados("alfa", $servidor);

$Produto = new \Alfa\Produto($db);
$Produto->setNome("produto");

/* Create  */
$colunasCreate = array (
    'nome',
    'preco'
);

$valoresCreate = array(
    "HD externo Seagate",
    530.00
);

//------------------------------------------------------------------------------



try {
    $db->conectar();
    
    $Produto->create($colunasCreate, $valoresCreate);
    
} catch (Exception $e) {
    
    echo $e->getMessage();
    
}
finally{
    $db->desconectar();
}

/* Update */
$colunasUpdate = array (
    'nome',
    'preco'
);

$valoresUpdate = array(
    "HD externo Seagate",
    530.00
);

$clausulaUpdate = "codigo = 1";

try {
    
    $db->conectar();
    
    $Produto->update($colunasUpdate, $valoresUpdate, $clausulaUpdate);
    
} catch (Exception $e) {
    
    echo $e->getMessage();
    
}
finally{
    
    $db->desconectar();
    
}


//------------------------------------------------------------------------------


/* Delete */

$clausulaDelete = "codigo = 3";

try {
    
    $db->conectar();
    
    $Produto->delete($clausulaDelete);
    
} catch (Exception $e) {
    
    echo $e->getMessage();
    
}
finally{
    
    $db->desconectar();
}

/* Retrieve */

$colunasRetrieve= array (
    'codigo',
    'nome',
    'preco'
);

$clausulaRetrieve = "codigo = 4";

//------------------------------------------------------------------------------


try {
    
    $db->conectar();
    
    $dados = $Produto->retrieve($colunasRetrieve, $clausulaRetrieve);
    
    foreach($dados as $key => $value) {
        
        $buffer = "<ul>";
        
        foreach($value as $idx => $valor ){
            
            $buffer .= "<li>" . $valor . "</li>";
            
        }
        $buffer .= "</ul>";
    
        echo $buffer;
    }
    
    
    
} catch (Exception $ex) {
    echo $e->getMessage();
}