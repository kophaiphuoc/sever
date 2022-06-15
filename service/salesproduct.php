<?php
    include_once '../config/dbconfig.php';
    class sales{
        private $connection;
        public function __construct(){
            $this->connection = (new DatabaseCongif())->getConnection();
        }
        public function getsales(){
            $query = 'SELECT A.QUANTITY,B.CREATEDDATE,DATEDIFF(CURRENT_DATE , B.CREATEDDATE )<=7 AS TUAN,
            DATEDIFF(CURRENT_DATE , B.CREATEDDATE )<= 30 AS THANG,
            DATEDIFF(CURRENT_DATE , B.CREATEDDATE )<=90 AS QUY
            FROM tblorderdetail AS A INNER JOIN tblorder AS B 
            ON A.ORDERID = B.ID
            HAVING TUAN = 1 OR THANG = 1 OR QUY = 1';
            $stmt = $this->connection->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }