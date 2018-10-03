<?php

interface NewsletterRepository{
    public function setConnection(mysqli $connection);

    public function insertNewsletter($newsletterId, $newsletterEmail);

    public function updateNewsletter($newsletterId, $newsletterEmail);

    public function deleteNewsletter($newsletterId);

    public function getNewsletter($newsletterId);

    public function getAllNewsletter();
}