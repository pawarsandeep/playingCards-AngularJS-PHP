<?php

/**
 * Created by PhpStorm.
 * User: Sandeep
 * Date: 11/27/2017
 * Time: 12:07 PM
 */
require_once __DIR__.'\\..\\config\\Database.php';
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
    $queryParams = array(':cardId'=>$cardId);
    $query = "select * from cards where c_id = :cardId";
    if (Database::$connection == NULL)
      Database::getConnection();
    $stmt = Database::$connection->prepare($query);
    $result = $stmt->execute($queryParams);
    if ($result && $row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      extract($row);
      return new self($c_id, $image_path, $suit);
    }
    else {
      return NULL;
    }
  }

  public static function getAllCards(){
    $cards = array();
    $query = "select * from cards";
    if (Database::$connection == NULL)
      Database::getConnection();
    $stmt = Database::$connection->prepare($query);
    $result = $stmt->execute();
    if($result) {
      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $cards[] = new self($c_id, $image_path, $suit);
      }
    }
    return $cards;
  }

}