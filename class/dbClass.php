<?php 

class dbClass {
    const SERVERNAME = "localhost";
    const USERNAME = "root";
    const PASSWORD = "";
    const DBNAME = "simple_logiN";
    
    protected function dbConn(){
        // Create connection
        $conn = new mysqli(self::SERVERNAME, self::USERNAME, self::PASSWORD, self::DBNAME);

        // return connection
        return $conn;
    }
}


?>