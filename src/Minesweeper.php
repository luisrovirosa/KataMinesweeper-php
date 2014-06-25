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
        for ($i = 0; $i < $columns; $i++) {
            for ($j = 0; $j < $files; $j++) {
                if ('*' == $fileContent[$i + 1][$j]) {
                    $this->board[$i][$j] = '*';
                }
            }
        }
    }

    public function getBoard()
    {
        return $this->board;
    }

}
