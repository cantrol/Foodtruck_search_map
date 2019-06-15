<?php
require_once 'Parameters.php';

class MapController extends AppController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function map()
    {
        $this->render('map',['API' => GOOGLEAPI]);
    }
}