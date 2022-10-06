<?php

class Connection{
    private $host = 'localhost';
    private $db_name = 'beautiful_gate';
    private $username = 'root';
    private $password = '';
    private $conn;

    public function connect(){
        $this->conn = null;
        try{
            $this->conn = new PDO('mysql:host='.$this->host.';dbname'.$this->db_name, $this->username,$this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            
        }catch(PDOException $e){
            echo 'there is an error on connection ';
           echo 'Connection error' . $e->getMessage();
        }
        return $this->conn;
    }

}