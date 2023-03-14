<?php
header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json');
header('Allow-Control-Allow-Methods: DELETE');
header('Allow-Control-Allow-Headers: Allow-Control-Access-Headers, Content-Type, Allow-Control-Allow-Methods, Authorization, X-Requested-With');

require_once "../../config/Database.php";
require_once "../../models/GetRoomData.php";


$database = new Database();
$conn = $database->connect();

$db = new GetRoomData($conn);

$data = json_decode(file_get_contents("php://input"));

$db->id = $data->id;


if($db->delete()){
    echo json_encode(array(
        "message" => "Room Deleted"
    ));
} else {
    echo json_encode(array(
        "message" => "Room Deletion Failed"
    ));
}