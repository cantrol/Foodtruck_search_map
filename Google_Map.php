<?php

require_once 'Parameters.php';

class Google_Map
{
    private $API_KEY;


    public function __construct()
    {
        $this->API_KEY = GOOGLEAPI;
    }

}

