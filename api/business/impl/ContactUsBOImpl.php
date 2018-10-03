<?php

require_once "/../../db/DBConnection.php";
require_once "/../ContactUsBO.php";
require_once "/../../repository/impl/ContactRepositoryImpl.php";


class ContactUsBOImpl implements ContactUsBO{

    private $contactRepository;

    public function __construct()
    {
        $this->contactRepository = new ContactRepositoryImpl();
    }

    public function insertContactUs($name, $email, $comment)
    {
        $connection = (new DBConnection())->getConnection();
        $this->contactRepository->setConnection($connection);
        $result = $this->contactRepository->insertContact($name, $email, $comment);
        mysqli_close($connection);
        return $result;
    }
}