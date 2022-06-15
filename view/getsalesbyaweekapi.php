<?php
    include_once '../service/salesbyaweek.php';
    $sales = (new salesbyaweek())->getsalesbyaweek();
    echo json_encode($sales);