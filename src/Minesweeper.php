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

    private function loadBombs($files, $columns, $fileContent)
    {
        for ($i = 0; $i < $columns; $i++) {
            for ($j = 0; $j < $files; $j++) {
                if ('*' == $fileContent[$i + 1][$j]) {
                    $this->board[$i][$j] = '*';

                    for ($x = $i - 1; $x <= $i + 1; $x++) {
                        for ($y = $j - 1; $y <= $j + 1; $y++) {
                            if ($this->board[$x][$y] != '*') {
                                $this->board[$x][$y] = 1;
                            }
                        }
                    }
                }
            }
        }
    }

}
