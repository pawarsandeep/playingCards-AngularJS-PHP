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
$gameToSave->card_states->board = array_filter($gameToSave->card_states->board, function ($v, $k){
  return isset($v->card);
});
$game->setCardStates($gameToSave->card_states);
$game->saveGame();
$a = 10;