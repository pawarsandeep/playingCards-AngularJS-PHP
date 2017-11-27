<?php

/**
 * Created by PhpStorm.
 * User: Sandeep
 * Date: 27-11-2017
 * Time: 02:04 PM
 */
include_once '../config/Database.php';
class Game {
  private $gameId;
  private $startTime;
  private $endTime;
  private $isCompleted;
  private $cardStates;

  /**
   * Game constructor.
   * @param $gameId
   * @param $startTime
   * @param $endTime
   * @param $isCompleted
   * @param $cardStates
   */
  public function __construct($gameId, $startTime, $endTime, $isCompleted, $cardStates = NULL) {
    $this->gameId = $gameId;
    $this->startTime = $startTime;
    $this->endTime = $endTime;
    $this->isCompleted = $isCompleted;
    $this->cardStates = $cardStates;
  }

  /**
   * @return mixed
   */
  public function getGameId() {
    return $this->gameId;
  }

  /**
   * @param mixed $gameId
   */
  public function setGameId($gameId) {
    $this->gameId = $gameId;
  }

  /**
   * @return mixed
   */
  public function getStartTime() {
    return $this->startTime;
  }

  /**
   * @param mixed $startTime
   */
  public function setStartTime($startTime) {
    $this->startTime = $startTime;
  }

  /**
   * @return mixed
   */
  public function getEndTime() {
    return $this->endTime;
  }

  /**
   * @param mixed $endTime
   */
  public function setEndTime($endTime) {
    $this->endTime = $endTime;
  }

  /**
   * @return mixed
   */
  public function getIsCompleted() {
    return $this->isCompleted;
  }

  /**
   * @param mixed $isCompleted
   */
  public function setIsCompleted($isCompleted) {
    $this->isCompleted = $isCompleted;
  }

  /**
   * @return mixed
   */
  public function getCardStates() {
    if(isset($this->cardStates))
      return $this->cardStates;
    else{
      $this->cardStates = CardState::loadAllByGameId($this->gameId);
      return $this->cardStates();
    }
  }

  /**
   * @param mixed $cardStates
   */
  public function setCardStates($cardStates) {
    $this->cardStates = $cardStates;
  }

  public static function loadAllByUser($userId){
    $games = array();
    $query = "select * from game where user_id = " . $userId;
    $result = Database::$connection->prepare($query)->execute();
    while ($row = $result->fetch(PDO::FETCH_ASSOC)){
      extract($row);
      $games = new self($g_id, $start_time, $end_time, $completed);
    }
    return $games;
  }

  public static function loadCompletedByUser($userId){
    $games = array();
    $query = "select * from game where user_id = " . $userId . " and completed = 1";
    $result = Database::$connection->prepare($query)->execute();
    while ($row = $result->fetch(PDO::FETCH_ASSOC)){
      extract($row);
      $games = new self($g_id, $start_time, $end_time, $completed);
    }
    return $games;
  }

  public static function loadRunningByUser($userId){
    $games = array();
    $query = "select * from game where user_id = " . $userId . " and completed = 0";
    $result = Database::$connection->prepare($query)->execute();
    while ($row = $result->fetch(PDO::FETCH_ASSOC)){
      extract($row);
      $games = new self($g_id, $start_time, $end_time, $completed);
    }
    return $games;
  }

  public function completeGame(){
    $query = "update game set completed = 1 where g_id = " . $this->gameId;
    $result = Database::$connection->prepare($query)->execute();
    if($result){
      $query = 'delete * from card_state where game_id = ' . $this->gameId;
      return TRUE;
    }
    else
      return FALSE;
  }
}