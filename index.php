<?php

require_once("config.php");
//CARREGA UM USUARIO PELO ID
//$root = new Usuario();
//$root->loadById(1);
//echo $root;

//CAREGA UMA LISTA DE USUARIOS
//$lista = Usuario::getList();
//echo json_encode($lista);

//CARREGA UMA LISTA DE USERS BUSCANDO PELO LOGIN
//$search = Usuario::search("r");
//echo json_encode($search);

//AUTENTICA USUARIO usando login e senha
//$usuario = new Usuario();
//$usuario->login("Rafaele","j3j3j3j3");
//echo $usuario;

//INSERINDO USUARIO NO BD
$aluno = new Usuario("Jaime","333555");//chama o construct do usuario()
$aluno->insert(); 
echo $aluno;





//OUTRA FORMA DE APRESENTAR A LISTA DE USUARIOS
//FORMA01

/*$sql = new Sql();
$usuarios = $sql->select("SELECT * FROM tb_usuarios");
echo json_encode($usuarios);*/

//FORMA 02
/*foreach($usuarios as $row){
    foreach($row as $key => $value){
        echo "<strong>".$key.":</strong>".$value."<br/>";
    }
    
    echo "==================================================<br>";
    
}*/

?>