<?php

interface CartBO{
    public function getNoOfItems($email);

    public function getItems($email);

    public function addToCart($email, $dvdId, $quantity);

    public function changeQuantity($email, $dvdId, $quantity);

    public function deleteFromCart($email, $dvdId);
}