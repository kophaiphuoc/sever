<?php
    class OrderInfor{
        public $orderid;
        public $productid;
        public $quantity;
        public $price;
        public $createddate;

        public function __construct($orderid,$productid,$quantity,$price,$createddate){
            $this->orderid = $orderid;
            $this->productid = $productid;
            $this->quantity = $quantity;
            $this->price = $price;
            $this->createddate = $createddate;
        }
        

        /**
         * Get the value of orderid
         */ 
        public function getOrderid()
        {
                return $this->orderid;
        }

        /**
         * Set the value of orderid
         *
         * @return  self
         */ 
        public function setOrderid($orderid)
        {
                $this->orderid = $orderid;

                return $this;
        }

        /**
         * Get the value of productid
         */ 
        public function getProductid()
        {
                return $this->productid;
        }

        /**
         * Set the value of productid
         *
         * @return  self
         */ 
        public function setProductid($productid)
        {
                $this->productid = $productid;

                return $this;
        }

        /**
         * Get the value of quantity
         */ 
        public function getQuantity()
        {
                return $this->quantity;
        }

        /**
         * Set the value of quantity
         *
         * @return  self
         */ 
        public function setQuantity($quantity)
        {
                $this->quantity = $quantity;

                return $this;
        }

        /**
         * Get the value of price
         */ 
        public function getPrice()
        {
                return $this->price;
        }

        /**
         * Set the value of price
         *
         * @return  self
         */ 
        public function setPrice($price)
        {
                $this->price = $price;

                return $this;
        }

        /**
         * Get the value of createddate
         */ 
        public function getCreateddate()
        {
                return $this->createddate;
        }

        /**
         * Set the value of createddate
         *
         * @return  self
         */ 
        public function setCreateddate($createddate)
        {
                $this->createddate = $createddate;

                return $this;
        }
    }