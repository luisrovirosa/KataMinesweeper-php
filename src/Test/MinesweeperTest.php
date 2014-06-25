<?php

namespace LuisRovirosa\Test;

use LuisRovirosa\Minesweeper;

class MinesweeperTest extends \PHPUnit_Framework_TestCase
{

    public function testMyMethodAllwaysReturnsTrue()
    {
        $myClass = new Minesweeper();
        $this->assertTrue($myClass->myMethod());
    }

}
