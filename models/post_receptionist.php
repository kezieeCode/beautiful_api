<?php

class ReceptionistPost{
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

    public function __construct($dab){
        $this->conn = $dab;
    }

    public function create_patient_record(){
        $query = 'INSERT INTO beautiful_gate.receptionist 
        SET
        full_name = :full_name,
        age = :age,
        address = :address,
        phone_number = :phone_number,
        occupation = :occupation,
        marital_status = :marital_status,
        next_kin = :next_kin,
        next_kin_number = :next_kin_number';

        $stmt = $this->conn->prepare($query);

   
        $this->full_name = htmlspecialchars(strip_tags($this->full_name));
        $this->age = htmlspecialchars(strip_tags($this->age));
        $this->address = htmlspecialchars(strip_tags($this->address));
        $this->phone_number = htmlspecialchars(strip_tags($this->phone_number));
        $this->occupation = htmlspecialchars(strip_tags($this->occupation));
        $this->marital_status = htmlspecialchars(strip_tags($this->marital_status));
        $this->next_kin = htmlspecialchars(strip_tags($this->next_kin));
        $this->next_kin_number = htmlspecialchars(strip_tags($this->next_kin_number));

        //bind the data 

   
        $stmt->bindParam(':full_name',$this->full_name);
        $stmt->bindParam(':age',$this->age);
        $stmt->bindParam(':address',$this->address);
        $stmt->bindParam(':phone_number',$this->phone_number);
        $stmt->bindParam(':occupation',$this->occupation);
        $stmt->bindParam(':marital_status',$this->marital_status);
        $stmt->bindParam(':next_kin',$this->next_kin);
        $stmt->bindParam(':next_kin_number',$this->next_kin_number);

        
        if($stmt->execute()){
            printf('Guy this stuff entered with an error');
            return true;
        }else{
            printf('Guy this stuff entered with an error');
            printf("Error %s. \n", $stmt->error);
        
            return false;
        }
        
    }
}