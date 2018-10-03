<?php

interface DvdRepository{
    public function setConnection(mysqli $connection);

    public function insertDvd($dvdId, $poster, $name, $director, $cast, $producer, $category, $price, $shipping, $discount, $dateAdded, $dateRemoved, $stock, $claimed, $archive);

    public function updateDvd($dvdId, $poster, $name, $director, $cast, $producer, $category, $price, $shipping, $discount, $dateAdded, $dateRemoved, $stock, $claimed, $archive);

    public function deleteDvd($dvdId);

    public function getDvd($dvdId);

    public function getAllDvd();

    public function getDvdByLatest();

    public function getDvdByCategory($category);

    public function getDvdCategory();
}