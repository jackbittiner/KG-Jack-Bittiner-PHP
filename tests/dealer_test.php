<?php

require './src/dealer.php';

class DealerTest extends PHPUnit_Framework_TestCase
{
  public function testFreshDeckOfCards()
  {
    $dealer = new Dealer;
    $this->assertEquals(52, count($dealer->deck->cards));
    $this->assertEquals(false, $dealer->deck->shuffled);
  }

  public function testForFourPlayers()
  {
    $dealer = new Dealer;
    $this->assertEquals(4, count($dealer->players));
  }

  public function testForShuffle()
  {
    $dealer = new Dealer;
    $dealer->shuffleDeck();
    $this->assertEquals(true, $dealer->deck->shuffled);
  }

  public function testDealSevenCardsToEachPlayer()
  {
    $dealer = new Dealer;
    $dealer->shuffleDeck();
    $dealer->dealCards();
    $this->assertEquals(7, count($dealer->players[0]->hand));
  }

  public function testDealsOneCardAtATime()
  {
    $dealer = new Dealer;
    $dealer->shuffleDeck();
    $card1 = $dealer->deck->cards[0];
    $card2 = $dealer->deck->cards[1];
    $card3 = $dealer->deck->cards[2];
    $card4 = $dealer->deck->cards[3];
    $dealer->dealCards();
    $this->assertEquals($card1, $dealer->players[0]->hand[0]);
    $this->assertEquals($card2, $dealer->players[1]->hand[0]);
    $this->assertEquals($card3, $dealer->players[2]->hand[0]);
    $this->assertEquals($card4, $dealer->players[3]->hand[0]);
  }

  public function testFailToDealIfNotShuffled ()
  {
    $this->setExpectedException('PHPUnit_Framework_Error');
    $result = $dealer->dealCards();
    $this->assertFalse($result);
  }
}


 ?>
