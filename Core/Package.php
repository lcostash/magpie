<?php

namespace Core;


use Core\Abstracts\AbstractPackage;
use Exception;

class Package extends AbstractPackage
{
    /**
     * @var int
     */
    private $min;

    /**
     * @var int
     */
    private $max;

    /**
     * @var int
     */
    private $count;

    /**
     * Package constructor.
     * @param int $min
     * @param int $max
     * @throws Exception
     */
    public function __construct(int $min, int $max)
    {
        $this->setMin($min);
        $this->setMax($max);
        $this->setCount(0);
    }

    /**
     * Return the count of the order.
     * @return int|null
     */
    public function getMin()
    {
        return $this->min;
    }

    /**
     * Set the count of the order.
     * @param int $quantity
     * @return $this
     * @throws Exception
     */
    public function setMin(int $quantity)
    {
        if (is_int($quantity) && $quantity > 0) {

            $this->min = $quantity;
            return $this;

        } else {
            throw new Exception('Min quantity must to be more than zero.');
        }
    }

    /**
     * Return the count of the order.
     * @return int|null
     */
    public function getMax()
    {
        return $this->max;
    }

    /**
     * Set the count of the order.
     * @param int $quantity
     * @return $this
     * @throws Exception
     */
    public function setMax(int $quantity)
    {
        if (is_int($quantity) && $quantity > 0) {

            $this->max = $quantity;
            return $this;

        } else {
            throw new Exception('Max quantity must to be more than zero.');
        }
    }

    /**
     * Return the amount how many time this package included in order.
     * @return int
     */
    public function getCount()
    {
        return $this->count ?? 0;
    }

    /**
     * Set the amount how many time the package used in order.
     * @param int $count
     * @return $this
     * @throws Exception
     */
    public function setCount(int $count)
    {
        if (is_int($count) && $count >= 0) {

            $this->count = $count;
            return $this;

        } else {
            throw new Exception('Count must to be more than/or equal with zero.');
        }
    }
}
