<?php

require_once "/../ContactRepository.php";

class ContactRepositoryImpl implements ContactRepository{

    private $connection;

    public function setConnection(mysqli $connection)
    {
        $this->connection = $connection;
    }

    public function insertContact($name, $email, $comment)
    {
        $result = $this->connection->query("INSERT INTO contact(name, email, comment, date, status)
											VALUES ('$name','$email','$comment', NOW(), 0)");
        return ($result && ($this->connection->affected_rows > 0));
    }

    public function updateContact($contactId, $name, $email, $comment, $date)
    {
        // TODO: Implement updateContact() method.
    }

    public function deleteContact($contactId)
    {
        // TODO: Implement deleteContact() method.
    }

    public function selectContact($contactId)
    {
        // TODO: Implement selectContact() method.
    }

    public function selectAllContact()
    {
        // TODO: Implement selectAllContact() method.
    }
}