<?php

require_once "/../AdminRepository.php";

class AdminRepositoryImpl implements AdminRepository{

    private $connection;

    public function setConnection(mysqli $connection)
    {
        $this->connection = $connection;
    }

    public function insertAdmin($adminId, $username, $password, $email)
    {
        // TODO: Implement insertAdmin() method.
    }

    public function updateAdmin($adminId, $username, $password, $email)
    {
        // TODO: Implement updateAdmin() method.
    }

    public function deleteAdmin($adminId)
    {
        // TODO: Implement deleteAdmin() method.
    }

    public function getAdmin($adminId)
    {
        // TODO: Implement getAdmin() method.
    }

    public function getAllAdmin()
    {
        // TODO: Implement getAllAdmin() method.
    }
}