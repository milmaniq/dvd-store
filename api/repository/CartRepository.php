<?php

interface CartRepository{
    public function setConnection(mysqli $connection);

    public function insertCart($email, $dvdId, $quantity);

    public function updateCart($email, $dvdId, $quantity);

    public function deleteCart($dvdId, $email);

    public function getCart($email);

    public function getAllCart();

    public function getNoOfItems($email);
}