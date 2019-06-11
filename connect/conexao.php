<?php

class Connectdb 
    {
    private $host= 'localhost';
    private $usuario = 'root';
    private $pass= '';
    private $db_name= 'base_oi';
    private $conn;

    public function __construct()
    {
        $this->conn = mysqli_connect($this->host, $this->usuario, $this->pass) 
        or die('Falha na conexão'. mysqli_connect_error($this->conn));

        mysqli_select_db($this->conn,$this->db_name) 
        or die('Falha ao selecionar banco'. mysqli_connect_error($this->conn));
    }

    public function getConn()
    {
        return $this->conn;
    }
}

var_dump($db_name);

?>

