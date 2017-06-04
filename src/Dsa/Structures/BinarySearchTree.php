<?php

namespace Dsa\Structures;

class BinarySearchTree
{
    /**
     * @var BinarySearchNode
     */
    private $root;


    public function insert($value)
    {
        $new = new BinarySearchNode($value);
        if (!$this->root) {
            $this->root = $new;
        } else {
            $this->insertNew($this->root, $new);
        }
    }

    public function insertNew(BinarySearchNode $current, BinarySearchNode $new)
    {
        if ($new->getValue() < $current->getValue()) {
            if (!$current->getLeft()) {
                $current->setLeft($new);
            } else {
                $this->insertNew($current->getLeft(), $new);
            }
        } else {
            if (!$current->getRight()) {
                $current->setRight($new);
            } else {
                $this->insertNew($current->getRight(), $new);
            }
        }
    }

    public function isInTree($value)
    {
        if (!$this->root) {
            return false;
        }
        return $this->contains($this->root, $value);
    }

    public function contains(BinarySearchNode $current = null, $value)
    {
        if (!$current) {
            return false;
        }
        return $this->findNode($current, $value) ? true:false;

    }

    public function getParentValueOf($value)
    {
        if ($value == $this->root->getValue()){
            return null;
        }

        return $this->findParent($this->root, $value)->getValue();
    }

    private function findParent(BinarySearchNode $current, $value)
    {
        if ($value < $current->getValue()) {
            if (!$current->getLeft()) {
                return null;
            } elseif ($current->getLeft()->getValue() == $value) {
                return $current;
            } else {
                return $this->findParent($current->getLeft(), $value);
            }
        } else {
            if (!$current->getRight()) {
                return null;
            } elseif ($current->getRight()->getValue() == $value) {
                return $current;
            } else {
                return $this->findParent($current->getRight(), $value);
            }
        }
    }

    private function findNode(BinarySearchNode $current = null, $value)
    {
        if (!$current) {
            return false;
        }

        if ($current->getValue() == $value) {
            return $current;
        } elseif ($value < $current->getValue()) {
            return $this->findNode($current->getLeft(), $value);
        } else {
            return $this->findNode($current->getRight(), $value);
        }


    }
}
