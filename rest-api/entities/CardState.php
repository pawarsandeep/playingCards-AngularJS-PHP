<?php

/**
 * Created by PhpStorm.
 * User: Sandeep
 * Date: 11/27/2017
 * Time: 12:22 PM
 */

// Include user & card class.
include_once 'Card.php';
include_once 'Game.php';
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
   */
  public function __construct($id, $card, $index, $container) {
    $this->id = $id;
    $this->card = $card;
    $this->index = $index;
    $this->container = $container;
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
    $cardStates['clubs'] = array();
    $cardStates['hearts'] = array();
    $cardStates['spades'] = array();
    $cardStates['diamonds'] = array();
    $cardStates['board'] = array();
    $queryParams = array(':gameId'=>$gameId);
    $query = "select container, cs_id, card_id, idx, game_id from card_state where game_id = :gameId";
    if (Database::$connection == NULL)
      Database::getConnection();
    $stmt = Database::$connection->prepare($query);
    $result = $stmt->execute($queryParams);

    if ($result && $stmt->rowCount() > 0){
      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $cardStates[$row['container']][] = new self($cs_id,Card::load($card_id),$idx, $container);
      }
    }
    else{
      $cards = Card::getAllCards();
      foreach ($cards as $i=>$card){
        $cardStates['board'][] = new self('', $card, $i, 'board');
      }
    }
    return $cardStates;
  }

}