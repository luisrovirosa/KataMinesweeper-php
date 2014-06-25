<?php

namespace LuisRovirosa\Test;

use LuisRovirosa\Minesweeper;

class MinesweeperTest extends \PHPUnit_Framework_TestCase
{

    const VALID_FILE = '../../data/first.txt';
    const INVALID_FILE = 'non_exixting_file';

    private $mine;

    protected function setUp()
    {
        parent::setUp();
        $this->mine = new Minesweeper();
    }

    public function testLoadAValidFileDoesNotThrowAnException()
    {
        $this->loadRelativePath($this->mine, self::VALID_FILE);
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
        $this->loadRelativePath($this->mine, self::VALID_FILE);
        $board = $this->mine->getBoard();
        $this->assertCount(4, $board);
    }

    private function loadRelativePath($mine, $file)
    {
        $mine->load(__DIR__ . '/' . $file);
    }

}
