<<?php

require('card.php');

class Deck
{

  public $cards;

  public function __construct()
    {
        $this->cards = array();
        $suits = array(
            'H','C','S','D'
        );
        $ranks = array(
            'A', 2, 3, 4, 5, 6, 7, 8, 9, 10,'J','Q','K'
        );
        foreach($suits as $suit)
        {
            foreach($ranks as $rank)
            {
                $card = new Card($rank,$suit);
                array_push($this->cards,$card);
            }
        }
    }

}

 ?>
