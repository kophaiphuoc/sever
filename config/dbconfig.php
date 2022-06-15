<?php
    class DatabaseCongif{
        public $connection;

        public function getConnection() {
            $this->connection=null;
            try {
                $this->connection= new PDO('mysql:host=localhost:3306;dbname=CONVINIENCESTORE','root','');
            } catch (Exception $e) {
               echo $e->getMessage();
            }
            return $this->connection;
        }
    }