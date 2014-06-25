<?php

namespace LuisRovirosa;

class Minesweeper
{

    const BOMB = '*';

    private $board;

    public function myMethod()
    {
        return true;
    }

    public function load($filename)
    {
        $fileContent = explode("\n", file_get_contents($filename));
        $firstLine = array_shift($fileContent);
        list($numFiles, $numColumns) = explode(' ', $firstLine);
        $this->board = array_fill(0, $numFiles, array_fill(0, $numColumns, '0'));
        $this->loadBombs($numFiles, $numColumns, $fileContent);
    }

    public function getBoard()
    {
        return $this->board;
    }

    private function loadBombs($numFiles, $numColumns, $inputBoard)
    {
        for ($i = 0; $i < $numFiles; $i++) {
            for ($j = 0; $j < $numColumns; $j++) {
                $this->processSquare($inputBoard[$i][$j], $i, $j, $numFiles, $numColumns);
            }
        }
    }

    private function processSquare($square, $i, $j, $numFiles, $numColumns)
    {
        if ($this->isBomb($square)) {
            $this->board[$i][$j] = self::BOMB;
            $this->increaseNumOfBombs($i, $j, $numFiles, $numColumns);
        }
    }

    private function increaseNumOfBombs($file, $column, $numFiles, $numColumns)
    {
        for ($i = max(0, $file - 1); $i < min($numFiles, $file + 2); $i++) {
            for ($j = max(0, $column - 1); $j < min($numColumns, $column + 2); $j++) {
                if (!$this->isBomb($this->board[$i][$j])) {
                    $this->board[$i][$j] += 1;
                }
            }
        }
    }

    private function isBomb($square)
    {
        return self::BOMB == $square;
    }

}
