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
    if ($this->deck->shuffled == false) {
      trigger_error("Please shuffle the deck", E_USER_ERROR);
    }
    if (count($this->deck->cards) < 52) {
      trigger_error("Return Cards and Shuffle", E_USER_ERROR);
    }
    $i = 0;
    $number_of_cards_needed = 7;
    while($i++ < $number_of_cards_needed)
    {
      array_push($this->players[0]->hand, $this->deck->cards[0]);
      array_shift($this->deck->cards);
      array_push($this->players[1]->hand, $this->deck->cards[0]);
      array_shift($this->deck->cards);
      array_push($this->players[2]->hand, $this->deck->cards[0]);
      array_shift($this->deck->cards);
      array_push($this->players[3]->hand, $this->deck->cards[0]);
      array_shift($this->deck->cards);
    }
  }

  public function returnCardsAndShuffle()
  {
    foreach($this->players as $player)
    {
      $this->deck->cards = array_merge($this->deck->cards, $player->hand);
      $player->hand = array();
    }
  }

}

 ?>
