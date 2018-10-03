<?php

interface CustomerRepository{
    public function setConnection(mysqli $connection);

    public function insertCustomer($email, $password, $firstName, $lastName, $gender,
                                   $streetAddress, $city, $country, $state, $mobile, $picture);

    public function updateCustomer($email, $password, $joinDate, $firstName, $lastName, $gender, $streetAddress, $city, $country, $state, $mobile, $picture);

    public function deleteCustomer($email);

    public function getCustomer($email);

    public function getAllCustomer();

    public function updateCustomerName($email, $firstName, $lastName);

    public function updateCustomerProfilePic($email, $profilePic);

    public function updateCustomerPassword($email, $password);
}