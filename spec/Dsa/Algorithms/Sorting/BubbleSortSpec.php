<?php

namespace spec\Dsa\Algorithms\Sorting;

use Dsa\Algorithms\Sorting\BubbleSort;
use PhpSpec\ObjectBehavior;


class BubbleSortSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(BubbleSort::class);
    }

    public function it_sorts_an_array_of_integers()
    {
        $source = [1123, 45, 76, 23, 87, 234, 34, 12, 36];
        $this->sort($source)->shouldBe([12, 23, 34, 36, 45, 76, 87, 234, 1123]);
    }
}
