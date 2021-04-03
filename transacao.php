<?php
//PDO **** BANCO /IP / USER / SENHA 
$conn = new PDO("mysql:dbname=dbphp7;host=localhost", "root","");
//metodo que INICIA transação , habilitar a possibilidade de desfazer um delete
$conn->beginTransaction();

//informação DELETE
$stmt = $conn->prepare("DELETE FROM tb_usuarios  WHERE idusuarios = ?");

$id = 3;

$stmt->execute(array($id));
//metodo que trabalha com begin para cancela transação
$conn->rollBack();
//caso fosse pra prosseguir usava o commit(), em vez de rollback()
//$conn->commit();
echo "DELETADO com SUCESSO!!!";



?>