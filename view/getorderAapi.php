<?php
    include_once '../service/orderA.php';
    $orderA = (new orderA())->getorderByWeek();
    echo json_encode($orderA);

   