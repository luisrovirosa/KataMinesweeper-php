<?php

namespace LuisRovirosa\Test;

use LuisRovirosa\Minesweeper;

class MinesweeperTest extends \PHPUnit_Framework_TestCase
{

    public function testLoadAValidFileDoesNotThrowAnException()
    {
        $mine = new Minesweeper();
        $mine->load('../data/first');
        $this->assertTrue(true);
    }

}
