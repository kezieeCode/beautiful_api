<?php
header('Access-Control-Allow-Origin: *');
header('Content-type: application/json');

include('../../models/read_receptionist.php');
include('../../config/db_con.php');

//instantiate connection
$conn_db = new Connection();
$database = $conn_db->connect();

//instantiate post

$read_record = new ReceptionistList($database);

$result = $read_record->read_patients_list();

$num = $result->rowCount();
//checking the database for the patients record
if($num > 0){
    $get_array = array();
    $get_array['data'] = array();
   while($row = $result->fetch(PDO::FETCH_ASSOC)){
    extract($row);
 

    $get_item = array(
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
    array_push($get_array['data'],$get_item);
    echo json_encode($get_item);
   }
}else{
    echo json_encode(array('there was no data'));
}