<?php
/**
 * Created by PhpStorm.
 * User: Fran Iglesias <franiglesias@mac.com>
 * Date: 29/3/17
 * Time: 16:17
 */

namespace Dsa;


class SinglyLinkedNode
{

    public $value;
    public $next;

    /**
     * SinglyNodeList constructor.
     *
     * @param mixed $value
     */
    public function __construct($value)
    {
        $this->value = $value;
        $this->next = null;
    }

    public function nextValueIsNotEqualTo($value)
    {
        return $this->next != null && $this->next->value != $value;
    }
}
