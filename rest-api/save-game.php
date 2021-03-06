<?php
/**
 * Created by PhpStorm.
 * User: Sandeep
 * Date: 11/28/2017
 * Time: 7:14 PM
 */

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset: UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once 'config/Database.php';
include_once 'entities/Game.php';
include_once 'entities/CardState.php';
$gameToSave = json_decode(file_get_contents('php://input'));
$game = Game::loadById($gameToSave->game_id);
if (isset($gameToSave->isCompleted) && $gameToSave->isCompleted == true)
{
  $game->setIsCompleted(true);
  if($game->saveGame())
    echo json_encode('success');
  else
    echo json_encode('failed');
}
else {
  foreach ($gameToSave->card_states->board as $i => $cardState){
    if (isset($cardState->length) && $cardState->length==0){
      unset($gameToSave->card_states->board[$i]);
    }
  }
  $game->setCardStates($gameToSave->card_states);
  if ($game->saveGame())
    echo json_encode('success');
  else
    echo json_encode('failed');
}