<<?php

class Card
{

  public $rank;
  public $suit;

  public function __construct($rank, $suit)
  {
    $this->suit = $suit;
    $this->rank = $rank;
  }

}

 ?>
