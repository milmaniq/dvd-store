<?php

require_once "/../../db/DBConnection.php";
require_once "/../CustomerBO.php";
require_once "/../../repository/impl/CustomerRepositoryImpl.php";

class CustomerBOImpl implements CustomerBO
{

    private $customerRepository;

    public function __construct()
    {
        $this->customerRepository = new CustomerRepositoryImpl();
    }

    public function checkSession()
    {
        //setcookie(session_name(),session_id(),time() + (10*60));
        session_set_cookie_params(60 * 60);
        session_start();
        if (!isset($_SESSION['email'])) {
            return false;
        } else {
            return true;
        }
    }


    public function authenticateLogin($email, $password)
    {
        $connection = (new DBConnection())->getConnection();
        $this->customerRepository->setConnection($connection);
        $customer = $this->customerRepository->getCustomer($email);
        mysqli_close($connection);
        if (count($customer) == 1) {
            if (password_verify($password, $customer[0]["password"])) {
                session_start();
                $_SESSION['email'] = $email;
                return true;
            } else {
                return false;
            }

        } else {
            return false;
        }
    }

    public function getCustomer($email)
    {
        $connection = (new DBConnection())->getConnection();
        $this->customerRepository->setConnection($connection);
        $customer = $this->customerRepository->getCustomer($email);
        mysqli_close($connection);
        return $customer;
    }


    public function registerCustomer($firstName, $lastName, $email, $password, $gender,
                                     $streetAddress, $city, $country, $state, $countryCode, $mobile)
    {
        $connection = (new DBConnection())->getConnection();
        $this->customerRepository->setConnection($connection);
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $mobile = $countryCode . $mobile;
        $picture = "default.jpg";
        $registerResult = $this->customerRepository->insertCustomer($email, $hashedPassword, $firstName, $lastName,
            $gender, $streetAddress, $city, $country, $state, $mobile, $picture);
        mysqli_close($connection);
        if ($registerResult) {

            $signinResult = $this->authenticateLogin($email, $password);

            return $signinResult;
        } else {
            return $registerResult;
        }
    }

    public function updateCustomerName($email, $firstName, $lastName)
    {
        $connection = (new DBConnection())->getConnection();
        $this->customerRepository->setConnection($connection);
        $result = $this->customerRepository->updateCustomerName($email, $firstName, $lastName);
        mysqli_close($connection);
        return $result;

    }

    public function updateCustomerProfilePic($email, $profilePicName, $profilePicTemp)
    {
        $connection = (new DBConnection())->getConnection();
        $this->customerRepository->setConnection($connection);
        move_uploaded_file($profilePicTemp, "../images/profile-pic/" . $profilePicName);
        $result = $this->customerRepository->updateCustomerProfilePic($email, $profilePicName);
        mysqli_close($connection);
        return $result;
    }

    public function signout($email)
    {
        unset($_SESSION['email']);
    }


    public function verifyCustomerPassword($email, $password)
    {
        $connection = (new DBConnection())->getConnection();
        $this->customerRepository->setConnection($connection);
        $customer = $this->customerRepository->getCustomer($email);
        mysqli_close($connection);
        if (password_verify($password, $customer[0]["password"])) {
            return true;
        } else {
            return false;
        }
    }


    public function updateCustomerPassword($email, $password)
    {
        $connection = (new DBConnection())->getConnection();
        $this->customerRepository->setConnection($connection);
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $result = $this->customerRepository->updateCustomerPassword($email, $hashedPassword);
        mysqli_close($connection);
        return $result;

    }
}