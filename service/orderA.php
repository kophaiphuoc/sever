<?php
    include_once '../config/dbconfig.php';
    class orderA{
        private $connection;
        public function __construct(){
            $this->connection = (new DatabaseCongif())->getConnection();
        }
        public function getorderByWeek(){
            $query = 'SELECT B.NAME, A.ORDERID, B.PRICE*A.QUANTITY AS TONG_TIEN_ORDER
            FROM tblorderdetail AS A INNER JOIN tblproduct AS B 
            ON A.PRODUCTID = B.ID
            WHERE A.ORDERID = 1';
            $stmt = $this->connection->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }