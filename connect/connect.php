<?php

class Connect 
{
    private $server = 'localhost';
    private $user = 'root';
    private $password = '';
    private $bank = 'login_teste';
    private $conn;

    public function __construct()
    {
        $this->conn = mysqli_connect($this->server, $this->user, $this->password) 
        or die('Falha na conexão'. mysqli_connect_error($this->conn));

        mysqli_select_db($this->conn,$this->bank) 
        or die('Falha ao selecionar banco'. mysqli_connect_error($this->conn));
    }

    public function getConn()
    {
        return $this->conn;
    }
}