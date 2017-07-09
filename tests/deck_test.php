<?php

require './src/deck.php';

class DeckTest extends PHPUnit_Framework_TestCase
{
  public function testForFiftyTwoCards()
  {
    $deck = new Deck;
    $number_of_cards_in_deck = 52;
    $this->assertEquals($number_of_cards_in_deck, count($deck->cards));
  }

  public function testForUniqueCards()
  {
    $deck = new Deck;
    $this->assertEquals('A', $deck->cards[0]->rank);
    $this->assertEquals('H', $deck->cards[0]->suit);
    $this->assertEquals('K', $deck->cards[51]->rank);
    $this->assertEquals('D', $deck->cards[51]->suit);
  }

}

 ?>