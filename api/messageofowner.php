<?php

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Origin, Content-Type, Authorization, Accept, X-Requested-With, x-xsrf-token");
header("Content-Type: application/json; charset=UTF-8");

include "config.php";

$postjson = json_decode(file_get_contents('php://input'), true);
$today = date('Y-m-d H:i:s');

$sql = mysqli_query($mysqli, "SELECT MAX(message_id) FROM messages");
$result = mysqli_fetch_assoc($sql);
$c_id = $result['MAX(message_id)'];
$c_id++;

if($postjson['aksi'] == 'send_message'){
    $donation_id= $postjson['donation_id'];

    $cpp = mysqli_fetch_array(mysqli_query($mysqli, "SELECT donation_id FROM donate_info WHERE donation_id = $donation_id" )); 
    $donation_id = $cpp['donation_id'];

    $insert = mysqli_query($mysqli, "INSERT INTO messages SET
            message_id = '$c_id',
            donation_id = '$donation_id',
            message  = '$postjson[message]',
            created_at = '$today'
    ");

    if($insert){
        $result = json_encode(array('success'=>true, 'msg'=>'Message Sent!'));
    }else {
        $result = json_encode(array('success'=>false, 'msg'=>'Failed'));
     }
    
    echo $result;
}

elseif($postjson['aksi'] == "loadmessage"){
    $data = array();    
    $query = mysqli_query($mysqli, "SELECT * FROM messages WHERE donation_id = '$postjson[donation_id]'");

    while($rows = mysqli_fetch_array($query)){
        $data[]= array(
            'message_id' => $rows['message_id'],           
            'donation_id' => $rows['donation_id'],          
            'message' => $rows['message'],
            'created_at' => $rows['created_at'],
           
        );
    }
   
    if($query){
        $result = json_encode(array('success'=>true, 'result'=>$data));
    }else {
        $result = json_encode(array('success'=>false));
     }
     echo $result;
}


?>