<?php
    include_once '../config/dbconfig.php';
    class orderByWeek{
        private $connection;
        public function __construct(){
            $this->connection = (new DatabaseCongif())->getConnection();
        }
        public function getorderByWeek(){
            $query = 'SELECT A.ORDERID as DANH_MUC,SUM(C.PRICE*A.QUANTITY)AS TONG_TIEN_MOI_BILL,B.CREATEDDATE AS NGAY_TAO FROM tblorderdetail AS A 
            INNER JOIN tblorder AS B ON A.ORDERID = B.ID
            INNER JOIN tblproduct AS C ON A.PRODUCTID = C.ID
            GROUP BY A.ORDERID
            HAVING DATEDIFF(CURRENT_DATE,B.CREATEDDATE) <= 30';
            $stmt = $this->connection->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }