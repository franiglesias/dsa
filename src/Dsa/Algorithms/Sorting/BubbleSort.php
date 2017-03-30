<?php

namespace Dsa\Algorithms\Sorting;

class BubbleSort
{
    public function sort(array $source)
    {
        $length = count($source);
        for ($i = 0; $i < $length; $i++) {
            for ($j = 0; $j < $length; $j++) {
                if ($source[$i] < $source[$j]) {
                    $this->swap($source[$i], $source[$j]);
                }
            }
        }

        return $source;
    }

    private function swap(&$a, &$b)
    {
        list($b, $a) = [$a, $b];
    }
}
