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

}


 ?>
