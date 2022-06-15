<?php
    include_once '../service/orderweek.php';
    $orderweek = (new orderByWeek())->getorderByWeek();
    echo json_encode($orderweek);