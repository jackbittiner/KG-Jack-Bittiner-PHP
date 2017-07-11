<<?php

require('card.php');

class Deck
{

  public $cards;
  public $card_sequences;
  public $shuffled;

  public function __construct()
    {
        $this->cards = array();
        $this->card_sequences = array();
        $this->shuffled = false;
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
        $this->card_sequences = array_map(null, $this->cards, array_slice($this->cards, 1));
    }

  public function shuffleCards()
  {
    shuffle($this->cards);
    $this->checkForSequence();
    do {
      shuffle($this->cards);
    } while(!$this->checkForSequence());
  }

  public function checkForSequence()
  {
    $this->shuffled = true;
    foreach($this->card_sequences as $sequent)
    {
      $array = array_map(null, $this->cards, array_slice($this->cards, 1));
      if (in_array($sequent, $array))
      {
        $this->shuffled = false;
      }
    }
    return $this->shuffled;
  }

}

 ?>
