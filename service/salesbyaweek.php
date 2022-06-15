<?php
    include_once '../config/dbconfig.php';
    class salesbyaweek{
        private $connection;
        public function __construct(){
            $this->connection = (new DatabaseCongif())->getConnection();
        }
        public function getsalesbyaweek(){
            $query = 'SELECT A.QUANTITY,B.CREATEDDATE,C.NAME FROM tblorderdetail AS A INNER JOIN tblorder AS B
            ON A.ORDERID = B.ID
            INNER JOIN tblproduct AS C
            ON A.PRODUCTID = C.ID
            HAVING DATEDIFF(CURRENT_DATE,B.CREATEDDATE) <=30 AND A.QUANTITY =  (SELECT MAX(A.QUANTITY) FROM tblorderdetail AS A 
            )';
            $stmt = $this->connection->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }