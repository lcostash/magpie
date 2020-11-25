<?php

namespace Core;


use Core\Abstracts\AbstractPackage;
use Core\Interfaces\OrderInterface;
use Exception;

class Order implements OrderInterface
{
    /**
     * The amount of order.
     * @var int
     */
    private $amount;

    /**
     * The available packages.
     * @var AbstractPackage[]
     */
    private $packages;

    /**
     * Return the count of the order.
     * @return int|null
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set the amount of the order.
     * @param int $amount
     * @return $this
     * @throws Exception
     */
    public function setAmount(int $amount): self
    {
        if (is_int($amount) && $amount > 0) {

            $this->amount = $amount;
            return $this;

        } else {
            throw new Exception('Amount must to be more than zero.');
        }
    }

    /**
     * Return the array of existing packages.
     * @return AbstractPackage[]|null
     */
    public function getPackages()
    {
        return $this->packages;
    }

    /**
     * Set the available packages to the order.
     * @param AbstractPackage[] $packages
     * @return $this
     * @throws Exception
     */
    public function setPackages(array $packages): self
    {
        if (is_array($packages) && count($packages) > 0) {

            $this->packages = $packages;
            return $this;

        } else {
            throw new Exception('Wrong packages.');
        }
    }

    /**
     * Get the order's result.
     * @return string
     * @throws Exception
     */
    public function getResult(): string
    {
        $result = [];

        // Get the packages
        $packages = $this->getPackages();
        if (is_null($packages) || count($packages) === 0) {
            throw new Exception('Please fill the available packages.');
        }

        // Get the amount
        $amount = $this->getAmount();
        if (is_null($amount) || !is_int($amount)) {
            throw new Exception('Please fill the right amount.');
        }

        // Reset the count of packages
        foreach ($packages as $package) {
            if ($package instanceof AbstractPackage) {
                $package->setCount(0);
            }
        }

        // Sort the packages
        usort($packages, function ($a, $b) {
            return $b->getMax() - $a->getMax();
        });

        $i = 0;
        while ($amount > 0) {
            if ($packages[$i] instanceof AbstractPackage) {
                $count = intval(floor($amount / $packages[$i]->getMax()));
                if ($i === count($packages) - 1 && $amount >= $packages[$i]->getMin() && $amount <= $packages[$i]->getMax()) {
                    $count = 1;
                }
                $packages[$i]->setCount($packages[$i]->getCount() + $count);
                $amount -= $count * $packages[$i]->getMax();
            } else break;
            ++$i;
        }

        foreach ($packages as $package) {
            if ($package instanceof AbstractPackage && $package->getCount() > 0) {
                $result[] = sprintf('%sx%s', $package->getMax(), $package->getCount());
            }
        }

        return implode(', ', $result);
    }
}