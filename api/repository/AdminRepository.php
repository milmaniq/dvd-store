<?php

interface AdminRepository{
    public function setConnection(mysqli $connection);

    public function insertAdmin($adminId, $username, $password, $email);

    public function updateAdmin($adminId, $username, $password, $email);

    public function deleteAdmin($adminId);

    public function getAdmin($adminId);

    public function getAllAdmin();
}