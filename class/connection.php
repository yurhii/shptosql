<?php

 class Connection{   

     protected $host = 'localhost';
     protected $port = 5432;
     protected $dbname = 'siarapurimac';
     protected $user = 'postgres';
     protected $password = '123456';
     protected $con = null;
    
    public function __construct() {
        $connection_string = "host=$this->host port=$this->port dbname=$this->dbname user=$this->user password=$this->password";
        $this->con = pg_connect($connection_string);
        if (!$this->con) {
            echo "Error en conexión.\n";            
        }
        return $this->con;
    }
    
    public function closeConnection(){
        return pg_close($this->con);
    }
    function statusCon(){
        if(!$this->con){
            echo "<h3>No se pudo conectar a  [$this->dbname] en [$this->host].</h3>";            
        }
        else{
            echo "<h3>Se contecto correctamente [$this->dbname] en [$this->host].</h3>";
        }
    }
}
 