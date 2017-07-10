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

}

 ?>
