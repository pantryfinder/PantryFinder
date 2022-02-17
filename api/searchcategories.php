<?php

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Origin, Content-Type, Authorization, Accept, X-Requested-With, x-xsrf-token");
header("Content-Type: application/json; charset=UTF-8");

include "config.php";

$postjson = json_decode(file_get_contents('php://input'), true);

if($postjson['aksi'] == "search_communitypantry"){
    $data = array();    
    $query = mysqli_query($mysqli, "SELECT users.user_fname, users.user_lname, community_pantry.* 
    FROM community_pantry, users WHERE community_pantry.user_id = users.user_id AND status LIKE '%n%' ORDER BY pantry_id DESC");

    while($rows = mysqli_fetch_array($query)){
        $data[]= array(
            'pantry_id' => $rows['pantry_id'],
            'user_fname'   => $rows['user_fname'],
            'user_lname'    => $rows['user_lname'],
            'pantry_name'     => $rows['pantry_name'],
            'user_contact' => $rows['user_contact'],
            'noodles' => $rows['noodles'],
            'delata' => $rows['delata'],
            'vegetables' => $rows['vegetables'],
            'fruits' => $rows['fruits'],
            'medicines' => $rows['medicines'],
            'hygiene_kits' => $rows['hygiene_kits'],
            'clothes' => $rows['clothes'],
           
  // 'list_of_items' => $rows['list_of_items'],
            'street_address' => $rows['street_address'],
            'barangay' => $rows['barangay'],
            'municipality' => $rows['municipality'],
            'province' => $rows['province'],
            'user_email' => $rows['user_email'],
            'gcash_number' => $rows['gcash_number'],
            'status' => $rows['status'],
        );
    }
   
    if($query){
        $result = json_encode(array('success'=>true, 'result'=>$data));
    }else {
        $result = json_encode(array('success'=>false));
     }
     echo $result;
}
elseif($postjson['aksi'] == "search_category1"){
    $data = array();    
    $query = mysqli_query($mysqli, "SELECT users.user_fname, users.user_lname, community_pantry.* FROM community_pantry, users
     WHERE community_pantry.user_id = users.user_id AND noodles = 1 ORDER BY pantry_id DESC");

    while($rows = mysqli_fetch_array($query)){
        $data[]= array(
            'pantry_id' => $rows['pantry_id'],
            'user_fname'   => $rows['user_fname'],
            'user_lname'    => $rows['user_lname'],
            'pantry_name'     => $rows['pantry_name'],
            'user_contact' => $rows['user_contact'],
            'noodles' => $rows['noodles'],
            'delata' => $rows['delata'],
            'vegetables' => $rows['vegetables'],
            'fruits' => $rows['fruits'],
            'medicines' => $rows['medicines'],
            'hygiene_kits' => $rows['hygiene_kits'],
            'clothes' => $rows['clothes'],
         //   'list_of_items' => $rows['list_of_items'],
            'street_address' => $rows['street_address'],
            'barangay' => $rows['barangay'],
            'municipality' => $rows['municipality'],
            'province' => $rows['province'],
            'user_email' => $rows['user_email'],
            'gcash_number' => $rows['gcash_number'],
            'status' => $rows['status'],
        );
    }
   
    if($query){
        $result = json_encode(array('success'=>true, 'result'=>$data));
    }else {
        $result = json_encode(array('success'=>false));
     }
     echo $result;
}

elseif($postjson['aksi'] == "search_category2"){
    $data = array();    
    $query = mysqli_query($mysqli, "SELECT users.user_fname, users.user_lname, community_pantry.* FROM community_pantry, users
     WHERE community_pantry.user_id = users.user_id AND delata = 1 ORDER BY pantry_id DESC");

    while($rows = mysqli_fetch_array($query)){
        $data[]= array(
            'pantry_id' => $rows['pantry_id'],
            'user_fname'   => $rows['user_fname'],
            'user_lname'    => $rows['user_lname'],
            'pantry_name'     => $rows['pantry_name'],
            'user_contact' => $rows['user_contact'],
            'noodles' => $rows['noodles'],
            'delata' => $rows['delata'],
            'vegetables' => $rows['vegetables'],
            'fruits' => $rows['fruits'],
            'medicines' => $rows['medicines'],
            'hygiene_kits' => $rows['hygiene_kits'],
            'clothes' => $rows['clothes'],
          //  'list_of_items' => $rows['list_of_items'],
            'street_address' => $rows['street_address'],
            'barangay' => $rows['barangay'],
            'municipality' => $rows['municipality'],
            'province' => $rows['province'],
            'user_email' => $rows['user_email'],
            'gcash_number' => $rows['gcash_number'],
            'status' => $rows['status'],
        );
    }
   
    if($query){
        $result = json_encode(array('success'=>true, 'result'=>$data));
    }else {
        $result = json_encode(array('success'=>false));
     }
     echo $result;
}

elseif($postjson['aksi'] == "search_category3"){
    $data = array();    
    $query = mysqli_query($mysqli, "SELECT users.user_fname, users.user_lname, community_pantry.* FROM community_pantry, users
     WHERE community_pantry.user_id = users.user_id AND vegetables = 1 ORDER BY pantry_id DESC");

    while($rows = mysqli_fetch_array($query)){
        $data[]= array(
            'pantry_id' => $rows['pantry_id'],
            'user_fname'   => $rows['user_fname'],
            'user_lname'    => $rows['user_lname'],
            'pantry_name'     => $rows['pantry_name'],
            'user_contact' => $rows['user_contact'],
            'noodles' => $rows['noodles'],
            'delata' => $rows['delata'],
            'vegetables' => $rows['vegetables'],
            'fruits' => $rows['fruits'],
            'medicines' => $rows['medicines'],
            'hygiene_kits' => $rows['hygiene_kits'],
            'clothes' => $rows['clothes'],
          //  'list_of_items' => $rows['list_of_items'],
            'street_address' => $rows['street_address'],
            'barangay' => $rows['barangay'],
            'municipality' => $rows['municipality'],
            'province' => $rows['province'],
            'user_email' => $rows['user_email'],
            'gcash_number' => $rows['gcash_number'],
            'status' => $rows['status'],
        );
    }
   
    if($query){
        $result = json_encode(array('success'=>true, 'result'=>$data));
    }else {
        $result = json_encode(array('success'=>false));
     }
     echo $result;
}


elseif($postjson['aksi'] == "search_category4"){
    $data = array();    
    $query = mysqli_query($mysqli, "SELECT users.user_fname, users.user_lname, community_pantry.* FROM community_pantry, users
     WHERE community_pantry.user_id = users.user_id AND fruits = 1 ORDER BY pantry_id DESC");

    while($rows = mysqli_fetch_array($query)){
        $data[]= array(
            'pantry_id' => $rows['pantry_id'],
            'user_fname'   => $rows['user_fname'],
            'user_lname'    => $rows['user_lname'],
            'pantry_name'     => $rows['pantry_name'],
            'user_contact' => $rows['user_contact'],
            'noodles' => $rows['noodles'],
            'delata' => $rows['delata'],
            'vegetables' => $rows['vegetables'],
            'fruits' => $rows['fruits'],
            'medicines' => $rows['medicines'],
            'hygiene_kits' => $rows['hygiene_kits'],
            'clothes' => $rows['clothes'],
          //  'list_of_items' => $rows['list_of_items'],
            'street_address' => $rows['street_address'],
            'barangay' => $rows['barangay'],
            'municipality' => $rows['municipality'],
            'province' => $rows['province'],
            'user_email' => $rows['user_email'],
            'gcash_number' => $rows['gcash_number'],
            'status' => $rows['status'],
        );
    }
   
    if($query){
        $result = json_encode(array('success'=>true, 'result'=>$data));
    }else {
        $result = json_encode(array('success'=>false));
     }
     echo $result;
}

elseif($postjson['aksi'] == "search_category5"){
    $data = array();    
    $query = mysqli_query($mysqli, "SELECT users.user_fname, users.user_lname, community_pantry.* FROM community_pantry, users
     WHERE community_pantry.user_id = users.user_id AND medicines = 1 ORDER BY pantry_id DESC");

    while($rows = mysqli_fetch_array($query)){
        $data[]= array(
            'pantry_id' => $rows['pantry_id'],
            'user_fname'   => $rows['user_fname'],
            'user_lname'    => $rows['user_lname'],
            'pantry_name'     => $rows['pantry_name'],
            'user_contact' => $rows['user_contact'],
            'noodles' => $rows['noodles'],
            'delata' => $rows['delata'],
            'vegetables' => $rows['vegetables'],
            'fruits' => $rows['fruits'],
            'medicines' => $rows['medicines'],
            'hygiene_kits' => $rows['hygiene_kits'],
            'clothes' => $rows['clothes'],
          //  'list_of_items' => $rows['list_of_items'],
            'street_address' => $rows['street_address'],
            'barangay' => $rows['barangay'],
            'municipality' => $rows['municipality'],
            'province' => $rows['province'],
            'user_email' => $rows['user_email'],
            'gcash_number' => $rows['gcash_number'],
            'status' => $rows['status'],
        );
    }
   
    if($query){
        $result = json_encode(array('success'=>true, 'result'=>$data));
    }else {
        $result = json_encode(array('success'=>false));
     }
     echo $result;
}

elseif($postjson['aksi'] == "search_category6"){
    $data = array();    
    $query = mysqli_query($mysqli, "SELECT users.user_fname, users.user_lname, community_pantry.* FROM community_pantry, users
     WHERE community_pantry.user_id = users.user_id AND hygiene_kits = 1 ORDER BY pantry_id DESC");

    while($rows = mysqli_fetch_array($query)){
        $data[]= array(
            'pantry_id' => $rows['pantry_id'],
            'user_fname'   => $rows['user_fname'],
            'user_lname'    => $rows['user_lname'],
            'pantry_name'     => $rows['pantry_name'],
            'user_contact' => $rows['user_contact'],
            'noodles' => $rows['noodles'],
            'delata' => $rows['delata'],
            'vegetables' => $rows['vegetables'],
            'fruits' => $rows['fruits'],
            'medicines' => $rows['medicines'],
            'hygiene_kits' => $rows['hygiene_kits'],
            'clothes' => $rows['clothes'],
          //  'list_of_items' => $rows['list_of_items'],
            'street_address' => $rows['street_address'],
            'barangay' => $rows['barangay'],
            'municipality' => $rows['municipality'],
            'province' => $rows['province'],
            'user_email' => $rows['user_email'],
            'gcash_number' => $rows['gcash_number'],
            'status' => $rows['status'],
        );
    }
   
    if($query){
        $result = json_encode(array('success'=>true, 'result'=>$data));
    }else {
        $result = json_encode(array('success'=>false));
     }
     echo $result;
}

elseif($postjson['aksi'] == "search_category7"){
    $data = array();    
    $query = mysqli_query($mysqli, "SELECT users.user_fname, users.user_lname, community_pantry.* FROM community_pantry, users
     WHERE community_pantry.user_id = users.user_id AND clothes = 1 ORDER BY pantry_id DESC");

    while($rows = mysqli_fetch_array($query)){
        $data[]= array(
            'pantry_id' => $rows['pantry_id'],
            'user_fname'   => $rows['user_fname'],
            'user_lname'    => $rows['user_lname'],
            'pantry_name'     => $rows['pantry_name'],
            'user_contact' => $rows['user_contact'],
            'noodles' => $rows['noodles'],
            'delata' => $rows['delata'],
            'vegetables' => $rows['vegetables'],
            'fruits' => $rows['fruits'],
            'medicines' => $rows['medicines'],
            'hygiene_kits' => $rows['hygiene_kits'],
            'clothes' => $rows['clothes'],
          //  'list_of_items' => $rows['list_of_items'],
            'street_address' => $rows['street_address'],
            'barangay' => $rows['barangay'],
            'municipality' => $rows['municipality'],
            'province' => $rows['province'],
            'user_email' => $rows['user_email'],
            'gcash_number' => $rows['gcash_number'],
            'status' => $rows['status'],
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