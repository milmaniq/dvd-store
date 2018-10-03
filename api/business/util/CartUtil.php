<?php

Class CartUtil{
    public $dvdId;
    public $quantity;

    /**
     * CartUtil constructor.
     * @param $dvdId
     * @param $quantity
     */
    public function __construct($dvdId, $quantity)
    {
        $this->dvdId = $dvdId;
        $this->quantity = $quantity;
    }


}