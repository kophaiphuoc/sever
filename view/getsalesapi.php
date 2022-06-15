<?php
    include_once '../service/salesproduct.php';
    $sales = (new sales())->getsales();
    echo json_encode($sales);