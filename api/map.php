<?php
  header('Access-Control-Allow-Origin: *');
  header("Access-Control-Allow-Credentials: true");
  header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE, OPTIONS");
  header("Access-Control-Allow-Headers: Origin, Content-Type, Authorization, Accept, X-Requested-With, x-xsrf-token");
  header("Content-Type: application/json; charset=UTF-8");
  

  include "config.php";

 // define('DB_NAME', 'pantryfinder');
//define('DB_USER', 'root');
//define('DB_PASSWORD', '');
//define('DB_HOST', 'localhost');
$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);


//$sql = "SELECT community_pantry.latitude, community_pantry.longitude, community_pantry.pantry_name, community_pantry.noodles, community_pantry.delata,
//community_pantry.vegetables, community_pantry.fruits, community_pantry.medicines, community_pantry.hygiene_kits, community_pantry.clothes,
//community_pantry.street_address, community_pantry.barangay, community_pantry.municipality, community_pantry.province, community_pantry.open_time, community_pantry.close_time, community_pantry.status, users.user_fname, users.user_lname FROM community_pantry INNER JOIN users ON users.user_id = community_pantry.user_id";

$sql = "SELECT community_pantry.latitude, community_pantry.longitude, community_pantry.pantry_name, 
community_pantry.street_address, community_pantry.barangay, community_pantry.municipality, community_pantry.province, community_pantry.open_time, community_pantry.close_time, community_pantry.status, users.user_fname, users.user_lname FROM community_pantry INNER JOIN users ON users.user_id = community_pantry.user_id";
$result = mysqli_query($mysqli, $sql);

$response = array();
while($row = mysqli_fetch_array($result))
{
    array_push($response, array(
                                
                                "latitude" => $row[0],
                                "longitude"   => $row[1],
                                "pantry_name"   => $row[2],
                               // "list_of_items" => $row[3],
                                "street_address" => $row[3],
                                "barangay" => $row[4],
                                "municipality" => $row[5],
                                "province" => $row[6],
                                "open_time" => $row[7],
                                "close_time" => $row[8],
                                "status" => $row[9],
                                "user_fname" => $row[10],
                                "user_lname" => $row[11]
                               
                                
                                
                                
                              
                            ));
}
echo json_encode($response);
mysqli_close($mysqli);
    



?>