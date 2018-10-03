<?php

require_once "/../DvdRepository.php";

class DvdRepositoryImpl implements DvdRepository
{

    private $connection;

    public function setConnection(mysqli $connection)
    {
        $this->connection = $connection;
    }

    public function insertDvd($dvdId, $poster, $name, $director, $cast, $producer, $category, $price, $shipping, $discount, $dateAdded, $dateRemoved, $stock, $claimed, $archive)
    {
        // TODO: Implement insertDvd() method.
    }

    public function updateDvd($dvdId, $poster, $name, $director, $cast, $producer, $category, $price, $shipping, $discount, $dateAdded, $dateRemoved, $stock, $claimed, $archive)
    {
        // TODO: Implement updateDvd() method.
    }

    public function deleteDvd($dvdId)
    {
        // TODO: Implement deleteDvd() method.
    }

    public function getDvd($dvdId)
    {

        $resultset = $this->connection->query("SELECT *
                                                FROM dvd 
                                                WHERE dvdId='$dvdId'");
        return $resultset->fetch_all(MYSQLI_ASSOC);

    }

    public function getAllDvd()
    {
        // TODO: Implement getAllDvd() method.
    }

    public function getDvdByLatest()
    {
        $resultset = $this->connection->query("SELECT dvdId, poster, name, price, discount 
                                                FROM dvd 
                                                ORDER BY dvdId DESC LIMIT 10");
        return $resultset->fetch_all(MYSQLI_ASSOC);
    }


    public function getDvdByCategory($category)
    {
        $resultset = $this->connection->query("SELECT dvdId, poster, name, price, discount 
                                                FROM dvd 
                                                WHERE category='$category' 
                                                ORDER BY dvdId DESC");
        return $resultset->fetch_all(MYSQLI_ASSOC);
    }

    public function getDvdCategory()
    {
        $resultset = $this->connection->query("SELECT DISTINCT category FROM dvd");
        return $resultset->fetch_all(MYSQLI_ASSOC);

    }
}