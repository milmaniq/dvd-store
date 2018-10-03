<?php

interface QueryRepository{
    public function setConnection(mysqli $connection);

    public function getDvdByTrending();

    public function getItems($email);

    public function getPurchaseHistory($email);
}