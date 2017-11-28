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
$queryParams = array(':username' => $credentials->username, ':password' => $credentials->password);
$query = "select user_id from user where user_name = :username and password = :password";
if (Database::$connection == NULL)
  Database::getConnection();
$stmt = Database::$connection->prepare($query);
$result = $stmt->execute($queryParams);
$response = array();
if ($result && $row = $stmt->fetch(PDO::FETCH_ASSOC))
{
  $user = User::Load($row['user_id']);
  $response['user'] = array('user_id'=> $user->getUserId(), 'user_name'=>$user->getUserName(),
    'email'=>$user->getEmail());
  $response['login'] = 'success';
}
else{
  $response['login'] = 'failed';
}
echo json_encode($response);