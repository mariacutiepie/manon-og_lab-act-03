<?php
    class Database {
        protected $connection;
        function connect(){
            try {
                $this->connection = new PDO("mysql:host=localhost;dbname=library;",
                "root", "");
            } catch (PDOException $e){
                echo "Connection Failed " . $e->getMessage(); 
            }
            return $this->connection;
        }
    }
?>