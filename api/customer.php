<?php

require_once "business/impl/CustomerBOImpl.php";

header("Content-Type: application/json");

$method = $_SERVER["REQUEST_METHOD"];

$customerBO = new CustomerBOImpl();

switch ($method) {
    case "GET":
        $action = $_GET["action"];

        switch ($action) {
            case "createSession":
                session_start();
                $_SESSION["email"]="basamrahman619@gmail.com";
                break;

            case "checkSession":
                echo (json_encode($customerBO->checkSession()));
                break;

            case "getCustomer":
                session_start();
                $email = $_SESSION["email"];
                echo (json_encode($customerBO->getCustomer($email)));
                break;

            case "signout":
                session_start();
                $email = $_SESSION["email"];
                echo (json_encode($customerBO->signout($email)));
                break;

        }

        break;

    case "POST":
        $action = $_POST["action"];

        switch ($action) {
            case "authenticateLogin":
                $email = $_POST["signinEmail"];
                $password = $_POST["signinPassword"];
                echo (json_encode($customerBO->authenticateLogin($email, $password)));
                break;

            case "verifyPassword":
                session_start();
                $email = $_SESSION["email"];
                $password = $_POST["profilePassword"];
                echo (json_encode($customerBO->verifyCustomerPassword($email, $password)));
                break;

            case "registerCustomer":
                $firstName = $_POST["registerFirstName"];
                $lastName = $_POST["registerLastName"];
                $email = $_POST["registerEmail"];
                $password = $_POST["registerPassword"];
                $gender = $_POST["registerGender"];
                $streetAddress = $_POST["registerStreetAddress"];
                $city = $_POST["registerCity"];
                $country = $_POST["registerCountry"];
                $state = $_POST["registerState"];
                $mobile = $_POST["registerMobile"];
                $countryCode = $_POST["registerCountryCode"];
                echo (json_encode($customerBO->registerCustomer($firstName, $lastName, $email, $password, $gender,
                    $streetAddress, $city, $country, $state, $countryCode, $mobile)));
                break;

            case "updateProfileName":
                session_start();
                $email = $_SESSION["email"];
                $firstName = $_POST["profileFirstName"];
                $lastName = $_POST["profileLastName"];
                echo (json_encode($customerBO->updateCustomerName($email, $firstName, $lastName)));
                break;

            case "updateProfilePic":
                session_start();
                $email = $_SESSION["email"];
                $profilePicName = $_FILES["profilePic"]['name'];
                $profilePicTemp = $_FILES["profilePic"]['tmp_name'];
                echo (json_encode($customerBO->updateCustomerProfilePic($email, $profilePicName, $profilePicTemp)));
                break;

            case "updateProfilePassword":
                session_start();
                $email = $_SESSION["email"];
                $password = $_POST["profileNewPassword"];
                echo (json_encode($customerBO->updateCustomerPassword($email, $password)));
                break;
        }






}