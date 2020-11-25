<?php

include_once('Core\Abstracts\AbstractPackage.php');
include_once('Core\Interfaces\OrderInterface.php');
include_once('Core\Package.php');
include_once('Core\Order.php');

use Core\Order;
use Core\Package;

$order = new Order();
try {

    $order->setPackages([
        new Package(1, 250),
        new Package(251, 500),
        new Package(501, 1000),
        new Package(1001, 2000),
        new Package(2001, 5000)
    ]);

    printf("%s = %s \n", 1, $order->setAmount(1)->getResult());
    printf("%s = %s \n", 250, $order->setAmount(250)->getResult());
    printf("%s = %s \n", 251, $order->setAmount(251)->getResult());
    printf("%s = %s \n", 501, $order->setAmount(501)->getResult());
    printf("%s = %s \n", 12001, $order->setAmount(12001)->getResult());

} catch (Exception $e) {
    echo $e->getMessage();
}
