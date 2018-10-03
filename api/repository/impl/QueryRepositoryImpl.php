<?php

require_once "/../QueryRepository.php";

class QueryRepositoryImpl implements QueryRepository{

    private $connection;

    public function setConnection(mysqli $connection)
    {
        $this->connection = $connection;
    }

    public function getDvdByTrending()
    {
        $resultset = $this->connection->query("SELECT sd.dvdId, sum(quantity), poster, name, price, discount 
                                                FROM SaleDvd sd, Dvd d 
                                                WHERE sd.dvdId = d.dvdId 
                                                GROUP BY dvdId 
                                                ORDER BY sum(quantity) DESC 
                                                LIMIT 10");

        return $resultset->fetch_all(MYSQLI_ASSOC);
    }

    public function getItems($email)
    {
        $resultset = $this->connection->query("SELECT poster, c.dvdId, name, quantity, price, discount, shipping 
                                                FROM Dvd d, Cart c 
                                                WHERE c.dvdId = d.dvdId AND email = '{$email}'");

        return $resultset->fetch_all(MYSQLI_ASSOC);
    }


    public function getPurchaseHistory($email)
    {
        $resultset = $this->connection->query("SELECT poster, name, quantity, total, date, time 
                                                FROM Sale s, SaleDvd sd, Dvd d, Customer c
										        WHERE c.email = s.email AND s.salesId = sd.salesId 
										        AND sd.dvdId = d.dvdId AND s.email = '{$email}'");

        return $resultset->fetch_all(MYSQLI_ASSOC);
    }
}