<?php

namespace DbConnect;

use PDO, PDOException;

require './Keys.php';

abstract class DbConnect{
    
        protected $host = HOST;

        protected $user = USER;

        protected $port = PORT;

        protected $dbname = DB;

        protected $pass = PASS;
        


        protected object $connect;

        public function connect(): ?PDO{

            try{
                
                $dsn = "mysql:host={$this->host};
                port={$this->port};
                dbname={$this->dbname}";


                $this->connect = new PDO($dsn, $this->user, $this->pass);

                return $this->connect;
                
            }catch(PDOException $err){

                error_log("Morri ". $err->getMessage());
                return null;

            }

        }

    
    
}
