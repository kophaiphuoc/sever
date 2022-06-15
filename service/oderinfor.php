<?php
    include_once '../config/dbconfig.php';
    include_once '../model/oderinfor.php';
    class OderInfor{
        private $connection;
        public function __construct(){
            $this->connection = (new DatabaseCongif())->getConnection();
        }
        public function getorderifor(){
            try{
            $query = 'SELECT C.ORDERID,C.PRODUCTID,C.QUANTITY,B.PRICE,D.CREATEDDATE
            FROM tblcategory AS A INNER JOIN tblproduct AS B
            ON A.ID = B.CATEGORYID
            INNER JOIN tblorderdetail AS C ON B.ID =C.PRODUCTID
            INNER JOIN tblorder AS D ON D.ID = C.ORDERID
            GROUP BY C.ORDERID 
            HAVING MONTH(D.CREATEDDATE)=5 AND YEAR(D.CREATEDDATE) =2022';
            $stmt = $this->connection->prepare($query);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute();
            
            $listorders =[];

            while ($row = $stmt->fetch()){
                extract($row);
                $getorderifor = new OrderInfor($ORDERID,$PRODUCTID,$QUANTITY,$PRICE,$CREATEDDATE);
                array_push($listorders,$getorderifor);
            }
            return $listorders;
        }   catch(Exception $e){
            echo "Error: " . $e->getMessage();
        } 
        }
    }