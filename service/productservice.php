<?php
    include_once '../config/dbconfig.php';
    class Productservice{
        private $connection;

        public function __construct(){
            $this->connection = (new DatabaseCongif())->getConnection(); 
        }

        public function getProducts(){
            $query = 'SELECT A.CATEGORYID AS DANH_MUC,(SUM(A.PRICE)*(A.QUANTITY)) AS TONG_GIA_SAN_PHAM_DANH_MUC,SUM(A.QUANTITY) AS TONG_SO_LUONG 
            from tblproduct AS A
            GROUP BY A.CATEGORYID';
            $stmt = $this->connection->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

    }