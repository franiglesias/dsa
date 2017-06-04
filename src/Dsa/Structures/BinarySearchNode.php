<?php
/**
 * Created by PhpStorm.
 * User: frankie
 * Date: 4/6/17
 * Time: 16:50
 */

namespace Dsa\Structures;


class BinarySearchNode
{
    private $value;
    private $left;
    private $right;

    public function __construct($value)
    {

        $this->value = $value;
    }

    /**
     * @return mixed
     */
    public function getLeft()
    {
        return $this->left;
    }

    /**
     * @param mixed $left
     */
    public function setLeft($left)
    {
        $this->left = $left;
    }

    /**
     * @return mixed
     */
    public function getRight()
    {
        return $this->right;
    }

    /**
     * @param mixed $right
     */
    public function setRight($right)
    {
        $this->right = $right;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }
}
