<?php

require './src/card.php';

class CardTest extends PHPUnit_Framework_TestCase
{
  public function testRank()
  {
    $rank = 2;
    $suit = 'H';
    $card = new Card($rank, $suit);
    $this->assertEquals(2, $card->rank);
  }

  public function testSuit()
  {
    $rank = 2;
    $suit = 'H';
    $card = new Card($rank, $suit);
    $this->assertEquals('H', $card->suit);
  }
}


 ?>
