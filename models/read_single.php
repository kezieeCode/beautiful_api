<?php

class ReceptionistSingle{
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
 

    public function read_patients_single(){
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
        WHERE
          r.id = ?
        LIMIT 0,1';
        
           $stmt = $this->conn->prepare($sql);
           //BIND ALL PARAMETERS FOR ID
           $stmt->bindParam(1, $this->id);
           $stmt->execute();
           $row = $stmt->fetch(PDO::FETCH_ASSOC);
           $this->id = $row['id'];
           $this->full_name = $row['full_name'];
      $this->age = $row['age'];
      $this->address = $row['address'];
      $this->phone_number = $row['phone_number'];
      $this->occupation = $row['occupation'];
      $this->marital_status = $row['marital_status'];
      $this->next_kin = $row['next_kin'];
      $this->next_kin_number = $row['next_kin_number'];
      $this->created_at = $row['created_at'];
          
    }
        
    
   }
