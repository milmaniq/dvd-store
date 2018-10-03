<?php

require_once "/../CustomerRepository.php";

class CustomerRepositoryImpl implements CustomerRepository{

    private $connection;

    public function setConnection(mysqli $connection)
    {
        $this->connection = $connection;
    }

    public function insertCustomer($email, $password, $firstName, $lastName, $gender, $streetAddress, $city, $country, $state, $mobile, $picture)
    {
        $result = $this->connection->query("INSERT INTO Customer VALUES ('$email', '$password', NOW(), '$firstName', '$lastName', '$gender', 
                                  '$streetAddress', '$city', '$country', '$state', '$mobile', '$picture')");
        return ($result && ($this->connection->affected_rows > 0));

    }

    public function updateCustomer($email, $password, $joinDate, $firstName, $lastName, $gender, $streetAddress, $city, $country, $state, $mobile, $picture)
    {
        // TODO: Implement updateCustomer() method.
    }

    public function deleteCustomer($email)
    {
        // TODO: Implement deleteCustomer() method.
    }

    public function getCustomer($email)
    {
        $resultset = $this->connection->query("SELECT email, password, firstName, lastName, picture
                                                FROM customer 
                                                WHERE email='$email'");
        return $resultset->fetch_all(MYSQLI_ASSOC);
    }

    public function getAllCustomer()
    {
        // TODO: Implement getAllCustomer() method.
    }

    public function updateCustomerName($email, $firstName, $lastName)
    {
        $result = $this->connection->query("UPDATE Customer 
                                            SET firstName='$firstName', lastName='$lastName'
                                            WHERE email='$email'");
        return ($result && ($this->connection->affected_rows > 0));
    }

    public function updateCustomerProfilePic($email, $profilePic)
    {
        $result = $this->connection->query("UPDATE Customer 
                                            SET picture='$profilePic'
                                            WHERE email='$email'");
        return ($result && ($this->connection->affected_rows > 0));
    }

    public function updateCustomerPassword($email, $password)
    {
        $result = $this->connection->query("UPDATE Customer 
                                            SET password='$password'
                                            WHERE email='$email'");
        return ($result && ($this->connection->affected_rows > 0));
    }
}