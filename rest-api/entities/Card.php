<?php

/**
 * Created by PhpStorm.
 * User: Sandeep
 * Date: 11/27/2017
 * Time: 12:07 PM
 */
include_once '../config/Database.php';
class Card
{
  // Properties
  public $id;
  public $imagePath;
  public $suit;
  private $isNew = FALSE;

  /**
   * @return mixed
   */
  public function getId() {
    return $this->id;
  }

  /**
   * @param mixed $id
   */
  public function setId($id) {
    $this->id = $id;
  }

  /**
   * @return mixed
   */
  public function getImagePath() {
    return $this->imagePath;
  }

  /**
   * @param mixed $imagePath
   */
  public function setImagePath($imagePath) {
    $this->imagePath = $imagePath;
  }

  /**
   * @return mixed
   */
  public function getSuit() {
    return $this->suit;
  }

  /**
   * @param mixed $suit
   */
  public function setSuit($suit) {
    $this->suit = $suit;
  }

  /**
   * Card constructor.
   * @param $id
   * @param $imagePath
   * @param $suit
   */
  public function __construct($id, $imagePath, $suit)
  {
    $this->id = $id;
    $this->imagePath = $imagePath;
    $this->suit = $suit;
  }

  public static function load($cardId){
    $query = "select * from cards where c_id = " . $cardId;
    $result = Database::$connection->prepare($query)->execute();
    $row = $result->fetch(PDO::FETCH_ASSOC);
    extract($row);
    return new self($c_id, $image_path, $suit);
  }

  public static function getAllCards(){
    $cards = array();
    $query = "select * from cards";
    $result = Database::$connection->prepare($query)->execute();
    while ($row = $result->fetch(PDO::FETCH_ASSOC)){
      extract($row);
      $cards[] = new self($c_id, $image_path, $suit);
    }
    return $cards;
  }

}