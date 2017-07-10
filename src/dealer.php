<<?php

require('deck.php');
require('player.php');

class Dealer
{

  public $deck;

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

}

 ?>
