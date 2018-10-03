<?php

interface ContactRepository{
    public function setConnection(mysqli $connection);

    public function insertContact($name, $email, $comment);

    public function updateContact($contactId, $name, $email, $comment, $date);

    public function deleteContact($contactId);

    public function selectContact($contactId);

    public function selectAllContact();
}