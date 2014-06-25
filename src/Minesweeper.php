<?php

namespace LuisRovirosa;

class Minesweeper
{

    private $board;

    public function myMethod()
    {
        return true;
    }

    public function load($filename)
    {
        $fileContent = explode("\n", file_get_contents($filename));
        list($files, $columns) = explode(' ', $fileContent[0]);
        $this->board = array_fill(0, $files, array_fill(0, $columns, '0'));
        $this->loadBombs($files, $columns, $fileContent);
    }

    public function getBoard()
    {
        return $this->board;
    }

    private function loadBombs($numFiles, $numColumns, $fileContent)
    {
        for ($i = 0; $i < $numColumns; $i++) {
            for ($j = 0; $j < $numFiles; $j++) {
                if ('*' == $fileContent[$i + 1][$j]) {
                    $this->board[$i][$j] = '*';
                    $this->increaseNumOfBombs($i, $j, $numFiles, $numColumns);
                }
            }
        }
    }

    private function increaseNumOfBombs($file, $column, $numFiles, $numColumns)
    {
        for ($i = max(0, $file - 1); $i < min($numFiles, $file + 2); $i++) {
            for ($j = max(0, $column - 1); $j < min($numColumns, $column + 2); $j++) {
                if ($this->board[$i][$j] != '*') {
                    $this->board[$i][$j] += 1;
                }
            }
        }
    }

}
