<?php

/**
 * Created by PhpStorm.
 * User: Sandeep
 * Date: 11/27/2017
 * Time: 12:22 PM
 */

// Include user & card class.
include_once '../entities/Card.php';
include_once '../entities/Game.php';
class CardState
{
  // Properties
  public $id;
  public $card;
  public $index;
  public $container;
  private $isNew = FALSE;

  /**
   * CardState constructor.
   * @param $id
   * @param $card
   * @param $index
   * @param $container
   * @param $game
   */
  public function __construct($id, $card, $index, $container) {
    $this->id = $id;
    $this->card = $card;
    $this->index = $index;
    $this->container = $container;
    $this->game = $game;
    $this->isNew = TRUE;
  }

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
   * @return \Card
   */
  public function getCard() {
    return $this->card;
  }

  /**
   * @param \Card $card
   */
  public function setCard($card) {
    $this->card = $card;
  }

  /**
   * @return mixed
   */
  public function getIndex() {
    return $this->index;
  }

  /**
   * @param mixed $index
   */
  public function setIndex($index) {
    $this->index = $index;
  }

  /**
   * @return mixed
   */
  public function getContainer() {
    return $this->container;
  }

  /**
   * @param mixed $container
   */
  public function setContainer($container) {
    $this->container = $container;
  }

  public static function loadAllByGameId($gameId){
    $cardStates = array();
    $query = "select * from card_state where game_id = " . $gameId;
    $result = Database::$connection->prepare($query)->execute();
    while ($row = $result->fetch(PDO::FETCH_ASSOC)){
      extract($row);
      $cardStates[] = new self($cs_id,Card::load($card_id),$index, $container);
    }
    return $cardStates;
  }


}