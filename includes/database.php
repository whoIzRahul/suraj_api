<?php

define('Host', 'localhost');
define('Username', 'root');
define('Password', '');
define('Database', 'login');

//class for the database connection
class Database
{

    private $connection;

    public function __construct()
    {
        $this->db_connect();
    }

    public function db_connect()
    {
        $this->connection = mysqli_connect(Host, Username, Password, Database);

        if (!$this->connection) {
            die('No connection');
        }
    
        return $this->connection;
    }


    public function query($sql)
    {
        $result = mysqli_query($this->connection, $sql);
        if (!$result) {
            die('Query fails: ' . $sql);
        }

        return $result;
    }

    public function fetchRow($result)
    {

        if ($result->num_rows > 0) {
            $row = mysqli_fetch_assoc($result);
            return $row;
        }
    }

    public function check_Login($result){
        if($result->num_rows > 0){
            return true;
        }else{
            return false;
        }
    }


    public function escape_value($value)
    {

        if ($value != null) {
            return false;
        } else {
            return true;
        }
    }
}

$database = new Database();
