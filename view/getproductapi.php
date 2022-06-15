<?php
    include_once '../service/productservice.php';
    $ProductS = (new Productservice())->getProducts();
    echo json_encode($ProductS);