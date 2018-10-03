<?php

require_once "business/impl/SaleBOImpl.php";

header("Content-Type: application/json");

$method = $_SERVER["REQUEST_METHOD"];

$saleBO = new SaleBOImpl();

switch ($method){
    case "GET":
        $action = $_GET["action"];

        switch ($action){
            case "getPurchaseHistory":
                echo (json_encode($saleBO->getPurchaseHistory()));
                break;
        }
        break;

    case "POST":

        break;
}