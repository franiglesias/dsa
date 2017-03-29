<?php

namespace Dsa;


class SinglyLinkedList
{
    private $head = null;
    private $tail = null;

    /**
     * Utility to get the count of items in the list
     * @return int
     */
    public function count()
    {
        if (!$this->head) {
            return 0;
        }
        $counter = 0;
        $node = $this->head;
        while ($node) {
            $counter++;
            $node = $node->next;
        }

        return $counter;
    }

    /**
     * Utility to get the items of the list as an array
     * @return array
     */
    public function asArray()
    {
        if (!$this->head) {
            return [];
        }
        $result = [];
        $node = $this->head;
        while ($node) {
            $result[] = $node->value;
            $node = $node->next;
        }

        return $result;

    }

    public function delete($value)
    {
        if (!$this->head) {
            return false;
        }
        $node = $this->head;
        if ($node->value == $value) {
            if ($this->head == $this->tail) {
                $this->head = null;
                $this->tail = null;
            } else {
                $this->head = $this->head->next;
            }

            return true;
        }
        while ($node->next != null && $node->next->value != $value) {
            $node = $node->next;
        }
        if ($node->next == $this->tail) {
            $node->next = false;
            $this->tail = $node;

            return true;
        }

        if ($node->next != null) {
            $node->next = $node->next->next;

            return true;
        }

        return false;
    }

    /**
     * Returns an array of the list with the items in reverse order
     * @return array
     */
    public function reverseArray()
    {
        $result = [];
        if ($this->tail) {
            $node = $this->tail;
            while ($node != $this->head) {
                $prev = $this->head;
                while ($prev->next != $node) {
                    $prev = $prev->next;
                }
                $result[] = $node->value;
                $node = $prev;
            }
            $result[] = $node->value;
        }

        return $result;
    }

    /**
     * Removes duplicated values in the list
     */
    public function optimize()
    {
        $tmp = clone $this;
        $this->emptyList();
        $node = $tmp->shift();
        $this->add($node->value);
        while ($tmp->head) {
            $node = $tmp->shift();
            if (!$this->hasValue($node->value)) {
                $this->add($node->value);
            }
        }
    }

    /**
     * Empties the list deleting head and tail references
     */
    protected function emptyList()
    {
        $this->head = null;
        $this->tail = null;
    }

    /**
     * Returns and remove the first element of the list
     * @return SinglyLinkedNode|null
     */
    protected function shift()
    {
        if (!$this->head) {
            return null;
        }
        $node = $this->head;
        $this->head = $this->head->next;

        return $node;
    }

    /**
     * @param mixed $value
     *
     * @return vpid
     */
    public function add($value)
    {
        $node = new SinglyLinkedNode ($value);
        if (!$this->head) {
            $this->head = $node;
            $this->tail = $node;
        } else {
            $this->tail->next = $node;
            $this->tail = $node;
        }
    }

    public function hasValue($value)
    {
        if (!$this->head) {
            return false;
        }
        $node = $this->head;
        while ($node) {
            if ($node->value == $value) {
                return true;
            }
            $node = $node->next;
        }

        return false;
    }


}
