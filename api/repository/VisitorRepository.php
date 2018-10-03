<?php

interface VisitorRepository{
    public function setConnection(mysqli $connection);

    public function insertVisitor($visitorId, $counter, $date, $ipAddress);

    public function updateVisitor($visitorId, $counter, $date, $ipAddress);

    public function deleteVisitor($visitorId);

    public function selectVisitor($visitorId);

    public function selectAllVisitor();
}