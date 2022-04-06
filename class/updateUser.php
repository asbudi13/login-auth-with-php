<?php  

class updateUser extends dbClass{

    function __construct(?string $key = null) {
        // set time local
        $timezone = new DateTimeZone('Asia/Jakarta');
        $date = new DateTime();
        $date->setTimeZone($timezone);
        
        $lastLogin = $date->format('Y-m-d H:i:s');

        // syntax update user
        $sql = "UPDATE user SET last_login = '$lastLogin' WHERE username_user = '$key'";
        
        // execute query
        $executed = $this->dbConn()->query($sql);

        return $executed;
    }
}

?>