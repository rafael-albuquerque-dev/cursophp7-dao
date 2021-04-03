<?php

require_once("config.php");

$sql = new Sql();

$usuarios = $sql->select("SELECT * FROM tb_usuarios");
echo json_encode($usuarios);
/*foreach($usuarios as $row){
    foreach($row as $key => $value){
        echo "<strong>".$key.":</strong>".$value."<br/>";
    }
    
    echo "==================================================<br>";
    
}*/

?>