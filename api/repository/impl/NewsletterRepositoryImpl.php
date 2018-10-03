<?php

require_once "/../NewsletterRepository.php";

class NewsletterRepositoryImpl implements NewsletterRepository{

    private $connection;

    public function setConnection(mysqli $connection)
    {
        $this->connection = $connection;
    }

    public function insertNewsletter($newsletterId, $newsletterEmail)
    {
        // TODO: Implement insertNewsletter() method.
    }

    public function updateNewsletter($newsletterId, $newsletterEmail)
    {
        // TODO: Implement updateNewsletter() method.
    }

    public function deleteNewsletter($newsletterId)
    {
        // TODO: Implement deleteNewsletter() method.
    }

    public function getNewsletter($newsletterId)
    {
        // TODO: Implement getNewsletter() method.
    }

    public function getAllNewsletter()
    {
        // TODO: Implement getAllNewsletter() method.
    }
}