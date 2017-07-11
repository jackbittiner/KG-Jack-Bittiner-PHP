<<?php

require('deck.php');
require('player.php');

class Dealer
{

  public $deck;
  public $players;

  public function __construct()
  {
    $this->deck = new Deck;
    $this->players = array();
    $i = 0;
    $number_of_players = 4;
    while($i++ < $number_of_players)
    {
      array_push($this->players, new Player);
    }
  }

  public function shuffleDeck()
  {
    $this->deck->shuffleCards();
  }

  public function dealCards()
  {
    $this->ableToDealCards();
    $i = 0;
    $number_of_cards_needed = 7;
    while($i++ < $number_of_cards_needed)
    {
      for ($x = 0; $x < 4; $x++)
      {
        $this->deal($x);
      }
    }
  }

  public function returnCardsAndShuffle()
  {
    foreach($this->players as $player)
    {
      $this->deck->cards = array_merge($this->deck->cards, $player->hand);
      $player->hand = array();
    }
    $this->deck->shuffleCards();
  }

  private function ableToDealCards()
  {
    if ($this->deck->shuffled == false) {
      trigger_error("Please shuffle the deck", E_USER_ERROR);
    }
    if (count($this->deck->cards) < 52) {
      trigger_error("Return Cards and Shuffle", E_USER_ERROR);
    }
  }

  private function deal($num)
  {
    array_push($this->players[$num]->hand, $this->deck->cards[0]);
    array_shift($this->deck->cards);
  }

}

 ?>
