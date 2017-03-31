<?php

namespace Dsa\Algorithms\Sorting;

class QuickSort
{
    public function sort(array $source)
    {
        $length = count($source);
        if ($length <= 1) {
            return $source;
        }
        $pivot = $this->median($source);
        $equal = $less = $greater = [];
        for ($i = 0; $i < $length; $i++) {
            if ($source[$i] == $pivot) {
                $equal[] = $source[$i];
            } elseif ($source[$i] < $pivot) {
                $less[] = $source[$i];
            } else {
                $greater[] = $source[$i];
            }
        }

        return array_merge($this->sort($less), $equal, $this->sort($greater));
    }

    private function median($source)
    {
        $points = [];
        for ($i = 0; $i < 3; $i++) {
            $point = array_splice($source, rand(0, count($source) - 1), 1);
            $points[] = array_shift($point);
        }

        return array_sum($points) - max($points) - min($points);
    }
}
