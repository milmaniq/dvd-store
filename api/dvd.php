<?php

require_once "business/impl/DvdBOImpl.php";

header("Content-Type: application/json");

$method = $_SERVER["REQUEST_METHOD"];

$dvdBO = new DvdBOImpl();

switch ($method){
    case "GET":
        $action = $_GET["action"];

        switch ($action){
            case "getDvdByTrending":
                echo (json_encode($dvdBO->getDvdByTrending()));
                break;

            case "getDvdByLatest":
                echo (json_encode($dvdBO->getDvdByLatest()));
                break;

            case "getDvdCategory":
                echo (json_encode($dvdBO->getDvdCategory()));
                break;

            case "getDvdByCategory":
                $category = $_GET["category"];
                echo (json_encode($dvdBO->getDvdByCategory($category)));
                break;

            case "getDvd":
                $dvdId = $_GET["dvdId"];
                echo (json_encode($dvdBO->getDvd($dvdId)));
                break;
        }
        break;

}