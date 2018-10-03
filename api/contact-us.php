<?php

require_once "business/impl/ContactUsBOImpl.php";

header("Content-Type: application/json");

$method = $_SERVER["REQUEST_METHOD"];

$contactUsBO = new ContactUsBOImpl();

switch ($method){
    case "POST":
        $action = $_POST["action"];

        switch ($action){
            case "insertContactUs":
                $name = $_POST["contactName"];
                $email = $_POST["contactEmail"];
                $comment = $_POST["contactComment"];
                echo (json_encode($contactUsBO->insertContactUs($name, $email, $comment)));
                break;
        }
        break;
}