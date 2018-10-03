<?php
/**
 * Created by IntelliJ IDEA.
 * User: Ilman Iqbal
 * Date: 8/5/2018
 * Time: 8:23 PM
 */

class DBConnection
{
    private $host = "127.0.0.1";
    private $user = "root";
    private $password = "";
    private $db = "ecorner";

    private $connection;

    public function __construct()
    {
        $this->connection = new mysqli($this->host, $this->user, $this->password, $this->db);

        if($this->connection->connect_error){
            echo $this->connection->connect_error;
            die;
        }
    }

    public function getConnection(){
        return $this->connection;
    }
}