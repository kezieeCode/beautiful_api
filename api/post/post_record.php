<?php

header('Access-Control-Allow-Origin: *');
header('Content-type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Methods,Content-type,Authorisations, X-Requested-With');

include_once '../../models/post_receptionist.php';
include_once '../../config/db_con.php';

//instantiate connection
$conn_db = new Connection();
$database = $conn_db->connect();

//instantiate post

$post_record = new ReceptionistPost($database);

$data = json_decode(file_get_contents("php://input"));

$post_record->full_name = $data->full_name;
$post_record->age = $data->age;
$post_record->address = $data->address;
$post_record->phone_number = $data->phone_number;
$post_record->occupation = $data->occupation;
$post_record->marital_status = $data->marital_status;
$post_record->next_kin = $data->next_kin;
$post_record->next_kin_number = $data->next_kin_number;


if($post_record->create_patient_record()){
    echo json_encode(array("message" => "record created successfully"));
    echo http_response_code(200);
}else{
    echo json_encode(array("message" => "error creating records"));
    http_response_code(400);
}