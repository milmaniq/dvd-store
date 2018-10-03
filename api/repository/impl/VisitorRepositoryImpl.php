<?php

require_once "/../VisitorRepository.php";

class VisitorRepositoryImpl implements VisitorRepository{

    private $connection;

    public function setConnection(mysqli $connection)
    {
        $this->connection = $connection;
    }

    public function insertVisitor($visitorId, $counter, $date, $ipAddress)
    {
        // TODO: Implement insertVisitor() method.
    }

    public function updateVisitor($visitorId, $counter, $date, $ipAddress)
    {
        // TODO: Implement updateVisitor() method.
    }

    public function deleteVisitor($visitorId)
    {
        // TODO: Implement deleteVisitor() method.
    }

    public function selectVisitor($visitorId)
    {
        // TODO: Implement selectVisitor() method.
    }

    public function selectAllVisitor()
    {
        // TODO: Implement selectAllVisitor() method.
    }
}