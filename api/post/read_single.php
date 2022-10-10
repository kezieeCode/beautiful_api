<?php
header('Access-Control-Allow-Origin: *');
header('Content-type: application/json');

include_once '../../models/read_single.php';
include_once '../../config/db_con.php';

//instantiate connection
$conn_db = new Connection();
$database = $conn_db->connect();

//instantiate post

$read_record = new ReceptionistSingle($database);

$read_record->id = isset($_GET['id']) ? $_GET['id'] : die();

$read_record->read_patients_single();
$post_arr = array(
    'id' => $read_record->id,
    'full_name' => $read_record->full_name,
    'age' => $read_record->age,
    'address' => $read_record->address,
    'phone_number' => $read_record->phone_number,
    'occupation' => $read_record->occupation,
    'marital_status' => $read_record->marital_status,
    'next_kin' => $read_record->next_kin,
    'next_kin_number' => $read_record->next_kin_number,
    'created_at' => $read_record->created_at
);

echo json_encode($post_arr);