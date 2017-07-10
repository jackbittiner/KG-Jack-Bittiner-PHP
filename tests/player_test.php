<?php

require './src/player.php';

class PlayerTest extends PHPUnit_Framework_TestCase
{
  public function testHand()
  {
    $player = new Player;
    $this->assertEquals(array(), $player->hand);
  }

}


 ?>
