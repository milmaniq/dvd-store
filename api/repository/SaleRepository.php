<?php

interface SaleRepository{
    public function setConnection(mysqli $connection);

    public function insertSale($saleId, $date, $time, $shippingFirstName, $shippingLastName, $shippingStreetAddress, $shippingCity, $shippingCountry, $shippingState, $shippingMobile, $shippingNetTotal, $email);

    public function updateSale($saleId, $date, $time, $shippingFirstName, $shippingLastName, $shippingStreetAddress, $shippingCity, $shippingCountry, $shippingState, $shippingMobile, $shippingNetTotal, $email);

    public function deleteSale($saleId);

    public function getSale($saleId);

    public function getAllSale();
}