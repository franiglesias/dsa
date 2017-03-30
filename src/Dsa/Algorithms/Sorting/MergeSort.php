<?php

namespace Dsa\Algorithms\Sorting;

class MergeSort
{
    public function sort($source)
    {
        if (count($source) == 1) {
            return $source;
        }
        $length = intval(count($source) / 2);
        $left = $this->sort(array_slice($source, 0, $length));
        $right = $this->sort(array_slice($source, $length));

        return $this->merge($left, $right);
    }

    private function merge($left, $right)
    {
        if (end($left) < $right[0]) {
            return array_merge($left, $right);
        }
        $result = [];
        while ($left) {
            if (!$right) {
                return array_merge($result, $left);
            }
            if ($left[0] < $right[0]) {
                $result[] = array_shift($left);
            } else {
                $result[] = array_shift($right);
            }
        }
        if ($right) {
            return array_merge($result, $right);
        } else {
            return $result;
        }

    }
}
