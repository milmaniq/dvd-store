<?php

require_once "/../../db/DBConnection.php";
require_once "/../SaleBO.php";
require_once "/../../repository/impl/QueryRepositoryImpl.php";

class SaleBOImpl implements SaleBO{

    private $queryRepository;

    public function __construct()
    {
        $this->queryRepository = new QueryRepositoryImpl();
    }


    public function getPurchaseHistory()
    {
        session_start();
        $email = $_SESSION["email"];
        $connection = (new DBConnection())->getConnection();
        $this->queryRepository->setConnection($connection);
        $purchases = $this->queryRepository->getPurchaseHistory($email);
        mysqli_close($connection);
        return $purchases;

    }
}