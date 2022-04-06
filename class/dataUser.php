<?php  

class dataUser extends dbClass{

    private $sql;

    function __construct(?string $username = null) {
        // syntax query get data user
        $this->sql = "SELECT username_user AS username, password_user AS pass FROM user WHERE username_user = '$username'";
    }

    public function getUser(){
        // execute query
        $executed = $this->dbConn()->query($this->sql);

        // loop data and save to variabel data array
        while($row = $executed->fetch_assoc()){
            $data[] = $row;
        }

        $result['data'] = $data;
        $result['nums'] = $executed->num_rows;

        // close the coneection
        mysqli_close($this->dbConn());

        // return the value
        return $result;
    }

}

?>