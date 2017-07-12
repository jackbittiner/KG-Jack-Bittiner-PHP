<?php

require('deck.php');
require('player.php');

class Dealer
{

  public $deck;
  public $players;
  public $able_to_deal;

  public function __construct()
  {
    $this->deck = new Deck;
    $this->able_to_deal = false;
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
    if($this->able_to_deal == true)
    {
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
      $this->able_to_deal = false;
      trigger_error("Please shuffle the deck");
    }
    elseif (count($this->deck->cards) < 52) {
      $this->able_to_deal = false;
      trigger_error("Return Cards and Shuffle");
    }
    else {
      $this->able_to_deal = true;
    }
  }

  private function deal($num)
  {
    array_push($this->players[$num]->hand, $this->deck->cards[0]);
    array_shift($this->deck->cards);
  }

}

 ?>
