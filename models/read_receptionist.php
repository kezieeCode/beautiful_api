<?php

class ReceptionistList{
    private $conn;
    private $u_table = 'receptionist';

    public $id;
    public $full_name;
    public $age;
    public $address;
    public $phone_number;
    public $occupation;
    public $marital_status;
    public $next_kin;
    public $next_kin_number;
    public $created_at;
    public function __construct($db){
       $this->conn = $db;
    }
 

    public function read_patients_list(){
        // create a query from the database
        $sql = 'SELECT 
           r.id,
           r.full_name,
           r.age,
           r.address,
           r.phone_number,
           r.occupation,
           r.marital_status,
           r.next_kin,
           r.next_kin_number,
           r.created_at
        FROM
           beautiful_gate.receptionist r
         ORDER BY
           r.created_at DESC';
           $stmt = $this->conn->prepare($sql);
           $stmt->execute();
           return $stmt;
    }
        
    
   }
