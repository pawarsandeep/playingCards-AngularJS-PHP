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

/**
 * Class CardState
 */
class CardState
{
  // Properties
  public $id;
  public $card;
  public $indexContainer;
  public $indexBoard;
  public $container;
  private $isNew = FALSE;

  /**
   * CardState constructor.
   * @param $id
   * @param $card
   * @param $index
   * @param $container
   */
  public function __construct($id, $card, $indexC, $indexB, $container) {
    $this->id = $id;
    $this->card = $card;
    $this->indexContainer = $indexC;
    $this->indexBoard = $indexB;
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

  /**
   * @param $gameId
   * @return bool
   */
  public function save($gameId)
  {
    if($this->id == '') {
      $queryParams = array(':cardId' => $this->card->getId(),
        ':indexC' => $this->indexContainer,
        ':indexB' => $this->indexBoard,
        ':container' => $this->container,
        ':gameId' => $gameId);
      $query = "insert into card_state (card_id, idx_container, idx_board, container, game_id) values(:cardId, :indexC, :indexB, :container, :gameId)";
      if (Database::$connection == NULL)
        Database::getConnection();
      $stmt = Database::$connection->prepare($query);
      $result = $stmt->execute($queryParams);
      if ($result){
        return true;
      }
      else{
        return false;
      }
    }
    else{
      $queryParams = array(':indexC' => $this->indexContainer,
        ':indexB' => $this->indexBoard,
        ':container' => $this->container,
        ':csId' => $this->id);
      $query = "update card_state set idx_container = :indexC, idx_board = :indexB, container = :container where cs_id = :csId";
      if (Database::$connection == NULL)
        Database::getConnection();
      $stmt = Database::$connection->prepare($query);
      $result = $stmt->execute($queryParams);
      $err = $stmt->errorInfo();
      if ($result){
        return true;
      }
      else{
        return false;
      }
    }
  }

  /**
   * @param $gameId
   * @return array
   */
  public static function loadAllByGameId($gameId){
    $cardStates = array();
    $cardStates['clubs'] = array();
    $cardStates['hearts'] = array();
    $cardStates['spades'] = array();
    $cardStates['diamonds'] = array();
    $cardStates['board'] = array();
    $queryParams = array(':gameId'=>$gameId);
    $query = "select container, cs_id, card_id, idx_container, idx_board, game_id from card_state where game_id = :gameId";
    if (Database::$connection == NULL)
      Database::getConnection();
    $stmt = Database::$connection->prepare($query);
    $result = $stmt->execute($queryParams);

    if ($result && $stmt->rowCount() > 0){
      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $state = new self($cs_id,Card::load($card_id),$idx_container, $idx_board, $container);
        $cardStates[$row['container']][] = $state;
        if ($row['container'] != 'board'){
          $s = clone $state;
          $s->length = 0;
          $cardStates['board'][] = $s;
        }
      }
    }
    else{
      $cards = Card::getAllCards();
      $boardIndex = range(0,51);
      shuffle($boardIndex);
      foreach ($cards as $i=>$card){
        $cardStates['board'][] = new self('', $card, 0,$boardIndex[$i], 'board');
      }
    }
    return $cardStates;
  }
}