<?php
header('Access-Control-Allow-Origin: *');
header('Content-type: application/json');

include_once '../../models/post_receptionist.php';
include_once '../../config/db_con.php';

//instantiate connection
$conn_db = new Connection();
$database = $conn_db->connect();

//instantiate post

$read_record = new ReceptionistPost($database);

$result = $read_record->read_patients_list();

$num = $result->rowCount();
//checking the database for the patients record
if($num > 0){
    $rec_array = array();
    $rec_array['info'] = array();
   while($row = $result->fetch(PDO::FETCH_ASSOC)){
    extract($row);
 

    $rec_item = array(
        'id' => $id,
        'full_name' => $full_name,
        'age' => $age,
        'address' => $address,
        'phone_number' => $phone_number,
        'occupation' => $occupation,
        'marital_status' => $marital_status,
        'next_kin' => $next_kin,
        'next_kin_number' => $next_kin_number,
        'created_at' => $created_at

    );

    array_push($rec_array['info'], $rec_item);
  
   }
   echo json_encode($rec_array);
}else{
    echo json_encode(array('message'=>'there was no data'));
}