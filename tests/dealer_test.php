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

}


 ?>
