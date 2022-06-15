<?php
    include_once '../config/dbconfig.php';
    class listmax{
        private $connection;
        public function __construct(){
            $this->connection = (new DatabaseCongif())->getConnection();
        }
        public function getlistmax(){
            $query = 'SELECT D.NAME,D.ID,A.QUANTITY,B.CREATEDDATE, C.PRICE FROM tblorderdetail AS A INNER JOIN tblorder AS B
            ON A.ORDERID = B.ID
            INNER JOIN tblproduct AS C
            ON A.PRODUCTID = C.ID
            INNER JOIN tblcategory AS D 
            ON C.CATEGORYID = D.ID 
            HAVING DATEDIFF(CURRENT_DATE,B.CREATEDDATE) <=30 ';
            $stmt = $this->connection->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }