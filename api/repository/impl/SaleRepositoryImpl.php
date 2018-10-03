<?php

require_once "/../SaleRepository.php";

class SaleRepositoryImpl implements SaleRepository
{

    private $connection;

    public function setConnection(mysqli $connection)
    {
        $this->connection = $connection;
    }

    public function insertSale($saleId, $date, $time, $shippingFirstName, $shippingLastName, $shippingStreetAddress, $shippingCity, $shippingCountry, $shippingState, $shippingMobile, $shippingNetTotal, $email)
    {
        // TODO: Implement insertSale() method.
    }

    public function updateSale($saleId, $date, $time, $shippingFirstName, $shippingLastName, $shippingStreetAddress, $shippingCity, $shippingCountry, $shippingState, $shippingMobile, $shippingNetTotal, $email)
    {
        // TODO: Implement updateSale() method.
    }

    public function deleteSale($saleId)
    {
        // TODO: Implement deleteSale() method.
    }

    public function getSale($saleId)
    {
        // TODO: Implement getSale() method.
    }

    public function getAllSale()
    {
        // TODO: Implement getAllSale() method.
    }
}