<?php

require_once "business/impl/CartBOImpl.php";

require_once "business/impl/DvdBOImpl.php";

require_once "business/util/CartUtil.php";

header("Content-Type: application/json");

$method = $_SERVER["REQUEST_METHOD"];

$cartBO = new CartBOImpl();
$dvdBO = new DvdBOImpl();

switch ($method) {
    case "GET":
        $action = $_GET["action"];

        switch ($action) {

            case "getItems":
                session_start();
                if (isset($_SESSION["email"])) {
                    $email = $_SESSION["email"];
                    echo(json_encode($cartBO->getItems($email)));
                } else {
                    if (isset($_SESSION["cart"])){
//                        print_r($_SESSION["cart"]);
//                        echo "<br>";
                        $cartItems = array_values($_SESSION["cart"]);
                        foreach ($cartItems as $dvd){
                            $dvdInfo = $dvdBO->getDvd($dvd->dvdId);
                            $dvd->poster = $dvdInfo[0]["poster"];
                            $dvd->name = $dvdInfo[0]["name"];
                            $dvd->price = $dvdInfo[0]["price"];
                            $dvd->shipping = $dvdInfo[0]["shipping"];
                            $dvd->discount = $dvdInfo[0]["shipping"];
                        }
                        echo(json_encode($cartItems));
                    }else{
                        echo "[]";
                    }

                }

                break;

        }

        break;

    case "POST":
        $action = $_POST["action"];

        switch ($action) {
            case "addToCart":
                session_start();
                if (isset($_SESSION["email"])) {
                    $email = $_SESSION["email"];
                    $dvdId = $_POST["dvdId"];
                    $quantity = $_POST["quantity"];
                    echo(json_encode($cartBO->addToCart($email, $dvdId, $quantity)));
                } else {
                    $dvdId = $_POST["dvdId"];
                    $quantity = $_POST["quantity"];

                    if (isset($_SESSION["cart"])) {
                        foreach ($_SESSION["cart"] as $item) {
                            if ($item->dvdId == $dvdId) {
                                $item->quantity = $item->quantity + $quantity;
                                echo true;
                                return;
                            }
                        }
                    }

                    $newCartItem = new CartUtil($dvdId, $quantity);
                    $_SESSION["cart"][] = $newCartItem;
                    echo true;
                }

                break;

            case "changeQuantity":
                session_start();
                if (isset($_SESSION["email"])) {
                    $email = $_SESSION["email"];
                    $dvdId = $_POST["dvdId"];
                    $quantity = $_POST["quantity"];
                    echo(json_encode($cartBO->changeQuantity($email, $dvdId, $quantity)));
                } else {
                    $dvdId = $_POST["dvdId"];
                    $quantity = $_POST["quantity"];
                    $cartItems = $_SESSION["cart"];
                    foreach ($cartItems as $item) {
                        if ($item->dvdId == $dvdId) {
                            $item->quantity = $quantity;
                            echo true;
                            return;
                        }
                    }
                    echo false;
                }
                break;
        }
        break;

    case "DELETE":

        session_start();
        $queryString = $_SERVER["QUERY_STRING"];
        $queryArray = preg_split("/=/", $queryString);
        $dvdId = $queryArray[1];
        if (isset($_SESSION["email"])) {
            $email = $_SESSION["email"];
            echo json_encode($cartBO->deleteFromCart($email, $dvdId));
        } else {
            if (isset($_SESSION["cart"])){
                foreach ($_SESSION["cart"] as $item) {
                    if ($item->dvdId == $dvdId) {
                        $key = array_search($item, $_SESSION["cart"]);
                        unset($_SESSION["cart"][$key]);
                        echo true;
                    }
                }
            }
        }


        break;

}