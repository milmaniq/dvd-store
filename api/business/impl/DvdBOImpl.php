<?php

require_once "/../../db/DBConnection.php";
require_once "/../DvdBO.php";
require_once "/../../repository/impl/DvdRepositoryImpl.php";
require_once "/../../repository/impl/QueryRepositoryImpl.php";

class DvdBOImpl implements DvdBO{

    private $dvdRepository;
    private $queryRepository;

    public function __construct()
    {
        $this->dvdRepository = new DvdRepositoryImpl();
        $this->queryRepository = new QueryRepositoryImpl();
    }

    public function getDvdByTrending()
    {
        $connection = (new DBConnection())->getConnection();
        $this->queryRepository->setConnection($connection);
        $dvd = $this->queryRepository->getDvdByTrending();
        mysqli_close($connection);
        return $dvd;
    }

    public function getDvdByLatest()
    {
        $connection = (new DBConnection())->getConnection();
        $this->dvdRepository->setConnection($connection);
        $dvd = $this->dvdRepository->getDvdByLatest();
        mysqli_close($connection);
        return $dvd;
    }

    public function getDvdCategory()
    {
        $connection = (new DBConnection())->getConnection();
        $this->dvdRepository->setConnection($connection);
        $category = $this->dvdRepository->getDvdCategory();
        mysqli_close($connection);
        return $category;
    }

    public function getDvdByCategory($category)
    {
        $connection = (new DBConnection())->getConnection();
        $this->dvdRepository->setConnection($connection);
        $dvd = $this->dvdRepository->getDvdByCategory($category);
        mysqli_close($connection);
        return $dvd;
    }

    public function getDvd($dvdId)
    {
        $connection = (new DBConnection())->getConnection();
        $this->dvdRepository->setConnection($connection);
        $dvd = $this->dvdRepository->getDvd($dvdId);
        mysqli_close($connection);
        return $dvd;
    }
}