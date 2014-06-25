<?php

namespace LuisRovirosa\Test;

use LuisRovirosa\Minesweeper;

class MinesweeperTest extends \PHPUnit_Framework_TestCase
{

    const NO_MINES = '../../data/no_mines.txt';
    const ONE_MINE_IN_THE_MIDDLE = '../../data/one_mine_in_the_middle.txt';
    const TWO_MINES_IN_THE_MIDDLE = '../../data/two_mines_in_the_middle.txt';
    const ONE_MINE_IN_THE_CORNER = '../../data/one_mine_in_corner.txt';
    const INVALID_FILE = 'non_exixting_file';

    private $mine;

    protected function setUp()
    {
        parent::setUp();
        $this->mine = new Minesweeper();
    }

    public function testLoadAValidFileDoesNotThrowAnException()
    {
        $this->loadRelativePath($this->mine, self::NO_MINES);
        $this->assertTrue(true);
    }

    /**
     * @expectedException \Exception
     */
    public function testLoadAnInvalidFileThrowAnException()
    {
        $this->loadRelativePath($this->mine, self::INVALID_FILE);
    }

    public function testAfterLoadA4x4BoardTheBoardIs4x4()
    {
        $this->loadRelativePath($this->mine, self::NO_MINES);
        $board = $this->mine->getBoard();
        $this->assertCount(4, $board);
    }

    public function testAfterLoadA4x4BoardWithoutMinesAllTheBoardIs0()
    {
        $this->loadRelativePath($this->mine, self::NO_MINES);
        $board = $this->mine->getBoard();
        $expectedBoard = array(
            array('0', '0', '0', '0'),
            array('0', '0', '0', '0'),
            array('0', '0', '0', '0'),
            array('0', '0', '0', '0'));
        $this->assertEquals($expectedBoard, $board);
    }

    public function testAfterLoadA4x4BoardWithOneMineTheMineIsDetected()
    {
        $this->loadRelativePath($this->mine, self::ONE_MINE_IN_THE_MIDDLE);
        $board = $this->mine->getBoard();
        $this->assertEquals('*', $board[1][1]);
    }

    public function testTheFieldsAroundABombAre1()
    {
        $this->loadRelativePath($this->mine, self::ONE_MINE_IN_THE_MIDDLE);
        $board = $this->mine->getBoard();
        $expectedBoard = array(
            array('1', '1', '1', '0'),
            array('1', '*', '1', '0'),
            array('1', '1', '1', '0'),
            array('0', '0', '0', '0'));
        $this->assertEquals($expectedBoard, $board);
    }

    public function test2BombsNotInTheCornersIsOk()
    {
        $this->loadRelativePath($this->mine, self::TWO_MINES_IN_THE_MIDDLE);
        $board = $this->mine->getBoard();
        $expectedBoard = array(
            array('1', '1', '1', '0'),
            array('2', '*', '2', '0'),
            array('2', '*', '2', '0'),
            array('1', '1', '1', '0'));
        $this->assertEquals($expectedBoard, $board);
    }

    public function test1MineInTheottomLeftCorner()
    {
        $this->loadRelativePath($this->mine, self::ONE_MINE_IN_THE_CORNER);
        $board = $this->mine->getBoard();
        $expectedBoard = array(
            array('*', '1', '0', '0'),
            array('1', '1', '0', '0'),
            array('0', '0', '0', '0'),
            array('0', '0', '0', '0'));
        $this->assertEquals($expectedBoard, $board);
    }

    private function loadRelativePath($mine, $file)
    {
        $mine->load(__DIR__ . '/' . $file);
    }

}
