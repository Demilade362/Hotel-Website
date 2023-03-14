<?php 
    class Database{
        private $host = "localhost";
        private $dbName = 'newapp';
        private $username = 'root';
        private $password = '';
        private $conn;

        public function connect(){
            $this->conn = null;
            $dsn = "mysql:host=". $this->host .";dbname=". $this->dbName;
            try {
                $this->conn = new PDO($dsn, $this->username, $this->password);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $error) {
                echo "Connection Error" . $error->getMessage();
            }

            return $this->conn;
        }
    }
