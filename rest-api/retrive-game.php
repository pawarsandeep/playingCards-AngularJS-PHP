<?php
/**
 * Created by PhpStorm.
 * User: Sandeep
 * Date: 11/28/2017
 * Time: 2:55 AM
 */

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset: UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once 'config/Database.php';
include_once 'entities/User.php';

$userId = json_decode(file_get_contents('php://input'));
$user = User::Load($userId);
$game = $user->getRunningGame();
if ($game == NULL){
  $game = $user->createNewGame();
}
$response = array();
$response['game_id'] = $game->getGameId();
$response['card_states'] = $game->getCardStates();
echo json_encode($response, JSON_NUMERIC_CHECK);