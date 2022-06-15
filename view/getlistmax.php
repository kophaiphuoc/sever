<?php
    include_once '../service/oderinfor.php';
    $OderInformation =(new OderInfor())->getorderifor();
    echo json_encode($OderInformation);
