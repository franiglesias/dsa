<?php

namespace spec\Dsa\Structures;

use Dsa\Structures\SinglyLinkedList;
use PhpSpec\ObjectBehavior;


class SinglyLinkedListSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith();
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(SinglyLinkedList::class);
    }

    public function it_holds_no_items_at_the_start()
    {
        $this->count()->shouldBe(0);
    }

    public function it_can_add_items_to_the_list()
    {
        $this->add(10);
        $this->count()->shouldBe(1);
    }

    public function it_can_add_several_values_to_the_list()
    {
        $values = array(10, 23, 45, 12, 43, 31, 54);
        foreach ($values as $value) {
            $this->add($value);
        }
        $this->count()->shouldBe(count($values));
        $this->asArray()->shouldBe($values);
    }

    public function it_can_search_for_a_value_in_empty_list()
    {
        $this->shouldNotHaveValue(34);
        $this->shouldNotHaveValue(28);
    }

    public function it_can_search_for_a_value_in_the_list()
    {
        $values = array(10, 23, 45, 12, 43, 31, 54);
        foreach ($values as $value) {
            $this->add($value);
        }
        $this->shouldHaveValue(23);
        $this->shouldHaveValue(12);
    }

    public function it_can_say_if_a_value_is_not_in_the_list()
    {
        $values = array(10, 23, 45, 12, 43, 31, 54);
        foreach ($values as $value) {
            $this->add($value);
        }
        $this->shouldNotHaveValue(16);
        $this->shouldNotHaveValue(29);
    }

    public function it_can_try_to_delete_a_value_in_empty_list_and_does_nothing()
    {
        $this->delete(34)->shouldBe(false);
        $this->count()->shouldBe(0);
    }

    public function it_can_delete_a_value_in_a_list_with_a_unique_value()
    {
        $this->add(34);
        $this->delete(34)->shouldBe(true);
        $this->count()->shouldBe(0);
    }

    public function it_can_delete_a_value_that_is_the_head()
    {
        $this->add(34);
        $this->add(12);
        $this->add(123);
        $this->delete(34)->shouldBe(true);
        $this->count()->shouldBe(2);
    }


    public function it_can_delete_a_value_that_is_the_tail()
    {
        $this->add(34);
        $this->add(12);
        $this->add(123);
        $this->delete(123)->shouldBe(true);
        $this->count()->shouldBe(2);
    }

    public function it_can_delete_a_value_that_is_in_the_middle()
    {
        $this->add(34);
        $this->add(12);
        $this->add(123);
        $this->delete(12)->shouldBe(true);
        $this->count()->shouldBe(2);
    }

    public function it_can_not_delete_a_value_that_is_not_present()
    {
        $this->add(34);
        $this->add(12);
        $this->add(123);
        $this->delete(25)->shouldBe(false);
        $this->count()->shouldBe(3);
    }

    public function it_can_return_items_in_reverse_order()
    {
        $values = array(10, 23, 45, 12, 43, 31, 54);
        foreach ($values as $value) {
            $this->add($value);
        }
        $this->reverseArray()->shouldBe(array_reverse($values));
    }

    public function it_can_optimize_the_list_deleting_repeated_values()
    {
        $values = array(10, 23, 10, 45, 31, 12, 43, 12, 45, 31, 31, 54);
        foreach ($values as $value) {
            $this->add($value);
        }
        $this->optimize();
        $this->asArray()->shouldBe([10, 23, 45, 31, 12, 43, 54]);
    }
}
