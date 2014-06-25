<?php

namespace LuisRovirosa\Test;

use LuisRovirosa\Minesweeper;

class MinesweeperTest extends \PHPUnit_Framework_TestCase
{

    public function testLoadAValidFileDoesNotThrowAnException()
    {
        $mine = new Minesweeper();
        $mine->load(__DIR__ . '/../../data/first.txt');
        $this->assertTrue(true);
    }

    /**
     * @expectedException \Exception
     */
    public function testLoadAnInvalidFileThrowAnException()
    {
        $mine = new Minesweeper();
        $mine->load('non_exixting_file');
    }

}
