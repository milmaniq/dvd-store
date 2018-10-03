<?php

require_once "/../../db/DBConnection.php";
require_once "/../CartBO.php";
require_once "/../../repository/impl/CartRepositoryImpl.php";
require_once "/../../repository/impl/QueryRepositoryImpl.php";

class CartBOImpl implements CartBO{

    private $cartRepository;
    private $queryRepository;

    public function __construct()
    {
        $this->cartRepository = new CartRepositoryImpl();
        $this->queryRepository = new QueryRepositoryImpl();
    }

    public function getNoOfItems($email)
    {
        $connection = (new DBConnection())->getConnection();
        $this->cartRepository->setConnection($connection);
        $items = $this->cartRepository->getNoOfItems($email);
        mysqli_close($connection);
        return $items;
    }

    public function getItems($email)
    {
        $connection = (new DBConnection())->getConnection();
        $this->queryRepository->setConnection($connection);
        $items = $this->queryRepository->getItems($email);
        mysqli_close($connection);
        return $items;
    }

    public function addToCart($email, $dvdId, $quantity)
    {
        $connection = (new DBConnection())->getConnection();
        $this->queryRepository->setConnection($connection);
        $items = $this->queryRepository->getItems($email);
        mysqli_close($connection);

        foreach ($items as $dvd){
            if ($dvd["dvdId"] == $dvdId){
                $quantity = $quantity + $dvd["quantity"];
                $connection = (new DBConnection())->getConnection();
                $this->cartRepository->setConnection($connection);
                $result = $this->cartRepository->updateCart($email, $dvdId, $quantity);
                mysqli_close($connection);
                return $result;
            }
        }
        $connection = (new DBConnection())->getConnection();
        $this->cartRepository->setConnection($connection);
        $result = $this->cartRepository->insertCart($email, $dvdId, $quantity);
        mysqli_close($connection);
        return $result;
    }

    public function changeQuantity($email, $dvdId, $quantity)
    {
        $connection = (new DBConnection())->getConnection();
        $this->cartRepository->setConnection($connection);
        $result = $this->cartRepository->updateCart($email, $dvdId, $quantity);
        mysqli_close($connection);
        return $result;
    }

    public function deleteFromCart($email, $dvdId)
    {
        $connection = (new DBConnection())->getConnection();
        $this->cartRepository->setConnection($connection);
        $result = $this->cartRepository->deleteCart($email, $dvdId);
        mysqli_close($connection);
        return $result;
    }
}