<?php

class Usuario{
    
    private $idusuario;
    private $deslogin;
    private $dessenha;
    private $dtcadastro;

    public function getIdusuario(){
        return $this->idusuario;
    }
    public function setIdusuario($value){
        $this->idusuario=$value;
    }

    public function getDeslogin(){
        return $this->deslogin;
    }
    public function setDeslogin($value){
        $this->deslogin=$value;
    }

    public function getDessenha(){
        return $this->dessenha;
    }
    public function setDessenha($value){
        $this->dessenha=$value;
    }

    public function getDtcadastro(){
        return $this->dtcadastro;
    }
    public function setDtcadastro($value){
        $this->dtcadastro=$value;
    }
//METODO PRA CONSULTAR USUARIO PELO SEU ID
    public function loadById($id){
        
        $sql = new Sql();
        
        $results = $sql->select("SELECT * FROM tb_usuarios WHERE idusuarios = :ID", array(
            ":ID" =>$id
        ));
        
        if(count($results) > 0){
            
            $this->setData($results[0]);
            
        }
        
    }

//METODO QUE MOSTRA NA TELA O QUE FOI CONSULTADO NO METODO loadById

    public function __toString()
    {
        return json_encode(array(
            "idusuario"=>$this->getIdusuario(),
            "deslogin"=>$this->getDeslogin(),
            "dessenha"=>$this->getDessenha(),
            "dtcadastro"=>$this->getDtcadastro()->format("d/m/Y H:m:s")
        )); 
    } 
//METODO PRA LISTAR TODOS OS USUARIOS DA TABELA

    public static function getList(){
        $sql = new Sql();
        
        return $sql->select("SELECT * FROM tb_usuarios ORDER BY deslogin");
        
    }
//METODO PRA PROCURAR USUARIO
    
    public static function search($login){
        
        $sql = new Sql();
        
        return $sql->select("SELECT * FROM tb_usuarios WHERE deslogin LIKE :SEARCH ORDER BY deslogin", array(
            ":SEARCH"=>"%".$login."%"
        ));
        
    }
//METODO PARA AUTENTICAR USUARIO
    
    public function login($login, $password){
        $sql = new Sql();
        
        $results = $sql->select("SELECT * FROM tb_usuarios WHERE deslogin = :LOGIN AND dessenha = :SENHA ", array(
            ":LOGIN" =>$login,
            ":SENHA"=>$password
        ));
        
        if(count($results) > 0){
            
            $this->setData($results[0]);
            
        }else{
            throw new Exception("Login ou senha inválidos.");
        }
    }
    
//METODO PARA RECEBER TODOS OS DADOS DO BANCO

    public function setData($data){
        
        $this->setIdusuario($data['idusuarios']);
        $this->setDeslogin($data['deslogin']);
        $this->setDessenha($data['dessenha']);
        $this->setDtcadastro(new DateTime($data['dtcadastro']));
        
    }
//METODO PARA INSERIR USUARIO

    public function insert(){
        
        $sql = new Sql();
        $results = $sql->select("CALL sp_usuarios_insert(:LOGIN, :PASSWORD)",array(
           ":LOGIN"=> $this->getDeslogin(),
           ":PASSWORD" => $this->getDessenha() 
        ));
        
        if(count($results) > 0){
            $this->setData($results[0]);//chama todos os dados do banco
        }
        
    }

//METODO CONSTRUTOR PRA INSERIR USUARIO PELO METODO INSERT()

    public function __construct($login = "", $password = ""){
        $this->setDeslogin($login);
        $this->setDessenha($password);
    }
    
    
    
}

?>