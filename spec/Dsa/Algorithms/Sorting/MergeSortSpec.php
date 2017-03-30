<?php

namespace spec\Dsa\Algorithms\Sorting;

use Dsa\Algorithms\Sorting\MergeSort;
use PhpSpec\ObjectBehavior;


class MergeSortSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(MergeSort::class);
    }

    public function it_sorts_an_array_of_one_integer()
    {
        $source = [1123];
        $this->sort($source)->shouldBe([1123]);
    }


    public function it_sorts_an_array_of_integers()
    {
        $source = [1123, 45, 76, 23, 87, 234, 34, 12, 36];
        $this->sort($source)->shouldBe([12, 23, 34, 36, 45, 76, 87, 234, 1123]);
    }

}
