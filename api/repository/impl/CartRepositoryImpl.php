<?php

require_once "/../CartRepository.php";

class CartRepositoryImpl implements CartRepository{

    private $connection;

    /**
     * CartRepositoryImpl constructor.
     * @param $connection
     */


    public function setConnection(mysqli $connection)
    {
        $this->connection = $connection;
    }

    public function insertCart($email, $dvdId, $quantity)
    {

        $result = $this->connection->query("INSERT INTO cart VALUES('$email','$dvdId','$quantity')");
        return ($result && ($this->connection->affected_rows > 0));
    }

    public function updateCart($email, $dvdId, $quantity)
    {
        $result = $this->connection->query("UPDATE cart SET quantity='$quantity' WHERE dvdId='$dvdId' AND email='$email'");
        return ($result && ($this->connection->affected_rows > 0));
    }

    public function deleteCart($email, $dvdId)
    {
        $result = $this->connection->query("DELETE FROM cart WHERE dvdId='$dvdId' AND email='$email'");
        return ($result && ($this->connection->affected_rows > 0));
    }

    public function getCart($email)
    {

    }

    public function getAllCart()
    {
        // TODO: Implement selectAllCart() method.
    }

    public function getNoOfItems($email)
    {
        $resultset = $this->connection->query("SELECT COUNT(DISTINCT(dvdId)) AS noOfItems
                                                FROM cart 
                                                WHERE email='$email'");
        return $resultset->fetch_all(MYSQLI_ASSOC);

    }
}