<?php
/**
 * Created by PhpStorm.
 * User: Sandeep
 * Date: 27-11-2017
 * Time: 08:00 PM
 */

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset: UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once 'config/Database.php';
include_once 'entities/User.php';

$credentials = json_decode(file_get_contents('php://input'));
$query = "select user_id from user where user_name = " . $credentials['username'] . " and password = " . $credentials['pass'];
$result = Database::$connection->prepare($query)->execute();
$response = array();
if ($row = $result->fetch(PDO::FETCH_ASSOC))
{
  $response['user'] = User::Load($row['user_id']);
  $response['login'] = 'success';
}
else{
  $response['login'] = 'failed';
}
echo json_encode($response);