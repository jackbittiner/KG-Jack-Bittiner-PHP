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

  public function testForCardsNotShuffledOnInitialization()
  {
    $deck = new Deck;
    $this->assertEquals(false, $deck->shuffled);
  }

  public function testForCardSequences()
  {
    $deck = new Deck;
    $this->assertEquals('A', $deck->card_sequences[0][0]->rank);
    $this->assertEquals('H', $deck->card_sequences[0][0]->suit);
    $this->assertEquals(2, $deck->card_sequences[0][1]->rank);
    $this->assertEquals('H', $deck->card_sequences[0][1]->suit);
  }

  public function testCheckForSequences()
  {
    $deck = new Deck;
    $deck->cards = array_reverse($deck->cards);
    $deck->checkForSequence();
    $this->assertEquals(true, $deck->shuffled);
  }

}

 ?>
