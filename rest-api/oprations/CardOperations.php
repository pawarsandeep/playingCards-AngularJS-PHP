<?php

/**
 * Created by PhpStorm.
 * User: Sandeep
 * Date: 11/27/2017
 * Time: 12:34 PM
 */

include_once '../config/Database.php';
include_once '../entities/Card.php';
class CardOperations
{
  // Database
  private $connection;
  public function __construct($connection)
  {
    $this->connection = $connection;
  }

  public function getAllCards(){
    $cards = array();
    $query = "select cards.c_id, cards.image_path, cards.suit from cards";
    $result = $this->connection->prepare($query)->execute();
    while ($row = $result->fetch(PDO::FETCH_ASSOC)){
      extract($row);
      $cards[] = new Card($c_id, $image_path, $suit);
    }
    return $cards;
  }
}