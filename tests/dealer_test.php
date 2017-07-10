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

}


 ?>
