<?php

/**
 * Created by PhpStorm.
 * User: Sandeep
 * Date: 11/27/2017
 * Time: 12:26 PM
 */
include_once '../config/Database.php';
include_once 'Game.php';
class User extends Database
{
  // Properties
  private $userId;
  private $userName;
  private $email;
  private $games;
  private $database;

  /**
   * User constructor.
   * @param $userId
   * @param $userName
   * @param $email
   * @param $games
   * @param $database
   */
  public function __construct($userId, $userName, $email, $games = NULL) {
    $this->userId = $userId;
    $this->userName = $userName;
    $this->email = $email;
    $this->games = $games;
  }

  /**
   * @return mixed
   */
  public function getUserId() {
    return $this->userId;
  }

  /**
   * @param mixed $userId
   */
  public function setUserId($userId) {
    $this->userId = $userId;
  }

  /**
   * @return mixed
   */
  public function getUserName() {
    return $this->userName;
  }

  /**
   * @param mixed $userName
   */
  public function setUserName($userName) {
    $this->userName = $userName;
  }

  /**
   * @return mixed
   */
  public function getEmail() {
    return $this->email;
  }

  /**
   * @param mixed $email
   */
  public function setEmail($email) {
    $this->email = $email;
  }

  /**
   * @return mixed
   */
  public function getGames() {
    return $this->games;
  }

  /**
   * @param mixed $games
   */
  public function setGames($games) {
    $this->games = $games;
  }

  public static function Load($userId){
    $query = "select * form user where user_id = " . $userId;
    $result = Database::$connection->prepare($query)->execute();
    $row = $result->fetch(PDO::FETCH_ASSOC);
    extract($row);
    return new self($user_id, $user_name, $email);
  }

  public function getAllGames(){
    return Game::loadAllByUser($this->userId);
  }

  public function getCompletedGames(){
    return Game::loadRunningByUser($this->userId);
  }

}