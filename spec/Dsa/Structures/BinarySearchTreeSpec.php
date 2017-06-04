<?php

namespace spec\Dsa\Structures;

use Dsa\Structures\BinarySearchTree;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class BinarySearchTreeSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(BinarySearchTree::class);
    }

    public function it_knows_that_value_is_not_in_empty_tree()
    {
        $this->shouldNotBeInTree(34);
    }

    public function it_knows_that_value_is_in_tree_if_it_is_the_unique()
    {
        $this->insert(15);
        $this->shouldBeInTree(15);
    }

    public function it_knows_that_other_values_are_not_in_tree()
    {
        $this->insert(15);
        $this->shouldNotBeInTree(76);
    }

    public function it_knows_what_values_are_in_the_tree()
    {
        $this->prepareAnExampleTree();

        $this->shouldBeInTree(34);
        $this->shouldBeInTree(12);
        $this->shouldBeInTree(76);

    }

    public function it_knows_what_values_are_not_in_the_tree()
    {
        $this->prepareAnExampleTree();

        $this->shouldNotBeInTree(65);
        $this->shouldNotBeInTree(2);
        $this->shouldNotBeInTree(123);

    }
    public function it_knows_that_the_parent_of_the_root_is_null()
    {
        $this->prepareAnExampleTree();


        $this->getParentValueOf(15)->shouldBeNull();
    }


    public function it_can_find_the_parent_of_a_node()
    {
        $this->prepareAnExampleTree();


        $this->getParentValueOf(12)->shouldBe(7);
        $this->getParentValueOf(76)->shouldBe(68);
        $this->getParentValueOf(7)->shouldBe(15);
    }

    protected function prepareAnExampleTree(): void
    {
        $this->insert(15);
        $this->insert(34);
        $this->insert(7);
        $this->insert(68);
        $this->insert(12);
        $this->insert(4);
        $this->insert(76);
    }
}
