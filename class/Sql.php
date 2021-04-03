<?php
//CLASSE generica usando os metodos do PDO

class Sql extends PDO{
    
    private $conn;

    
    //METODO CONSTRUTOR PRA CONEXÃO
    
    public function __construct()
    {
        $this->conn = new PDO("mysql:host=localhost;dbname=dbphp7", "root","");
    }
    
    //METODO PRA RECEBER VARIOS PARAMETROS
    private function setParams($statement, $parameters = array())
    {
        
          foreach ($parameters as $key => $value)
          {
            $this->setParam($statement,$key, $value);
          }
        
    }
    
    //METODO PARA RECEBER SO UM PARAMETRO
    private function setParam($statement, $key, $value)
    {
        $statement->bindParam($key, $value);
    }
    //METODO PRA consulta A CONEXÃO COM BD
    public function query($rawQuery, $params = array())
    {
        $stmt =  $this->conn->prepare($rawQuery);
        
        $this->setParams($stmt, $params);

        $stmt->execute();

        return $stmt;
          
    }

    //METODO PRA SELECIONAR - SELECT
    
    public function select($rawQuery, $params = array()):array
    {
       $stmt = $this->query($rawQuery, $params);
       return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
}

?>