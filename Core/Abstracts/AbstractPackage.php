<?php

namespace Core\Abstracts;


abstract class AbstractPackage
{
    /**
     * Get the quantity of the package.
     * @return int|null
     */
    abstract public function getMin();

    /**
     * Set the quantity of the package.
     * @param int $quantity
     * @return $this
     */
    abstract public function setMin(int $quantity);

    /**
     * Get the quantity of the package.
     * @return int|null
     */
    abstract public function getMax();

    /**
     * Set the quantity of the package.
     * @param int $quantity
     * @return $this
     */
    abstract public function setMax(int $quantity);

    /**
     * Return the amount how many time this package included in order.
     * @return int
     */
    abstract public function getCount();

    /**
     * Set the amount how many time the package used in order.
     * @param int $amount
     * @return $this
     */
    abstract public function setCount(int $amount);
}



