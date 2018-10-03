<?php

interface CustomerBO{

    public function checkSession();

    public function authenticateLogin($email, $password);

    public function getCustomer($email);

    public function registerCustomer($firstName, $lastName, $email, $password, $gender,
                                     $streetAddress, $city, $country, $state, $countryCode, $mobile);

    public function signout($email);

    public function updateCustomerName($email, $firstName, $lastName);

    public  function updateCustomerProfilePic($email, $profilePicName, $profilePicTemp);

    public  function verifyCustomerPassword($email, $password);

    public function updateCustomerPassword($email, $password);
}