<?php

namespace Dsa\Structures;

class BinarySearchTree
{
    /**
     * @var BinarySearchNode
     */
    private $root;

    public function insert($value): void
    {
        $new = new BinarySearchNode($value);
        if (! $this->root) {
            $this->root = $new;
            return;
        }

        $this->insertNew($this->root, $new);
    }

    public function insertNew(
        BinarySearchNode $current,
        BinarySearchNode $new
    ) {
        if ($new->getValue() < $current->getValue()) {
            if (! $current->getLeft()) {
                $current->setLeft($new);

                return;
            }

            $this->insertNew($current->getLeft(), $new);

            return;
        }

        if (! $current->getRight()) {
            $current->setRight($new);

            return;
        }

        $this->insertNew($current->getRight(), $new);
    }

    public function isInTree($value)
    {
        if (! $this->root) {
            return false;
        }

        return $this->contains($this->root, $value);
    }

    public function contains(
        BinarySearchNode $current = null,
        $value
    ) {
        if (! $current) {
            return false;
        }

        return $this->findNode($current, $value) ? true : false;
    }

    public function getParentValueOf($value)
    {
        if ($value == $this->root->getValue()) {
            return null;
        }

        return $this->findParent($this->root, $value)->getValue();
    }

    private function findParent(
        BinarySearchNode $current,
        $value
    ) {
        if ($value < $current->getValue()) {
            if (! $current->getLeft()) {
                return null;
            }

            if ($current->getLeft()->getValue() === $value) {
                return $current;
            }

            return $this->findParent($current->getLeft(), $value);
        }

        if (! $current->getRight()) {
            return null;
        }

        if ($current->getRight()->getValue() == $value) {
            return $current;
        }

        return $this->findParent($current->getRight(), $value);
    }

    private function findNode(
        BinarySearchNode $current = null,
        $value
    ) {
        if (! $current) {
            return false;
        }

        if ($current->getValue() === $value) {
            return $current;
        }

        if ($value < $current->getValue()) {
            return $this->findNode($current->getLeft(), $value);
        }

        return $this->findNode($current->getRight(), $value);
    }
}
