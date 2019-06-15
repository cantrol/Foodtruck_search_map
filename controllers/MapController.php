<?php
require_once 'Parameters.php';

require_once __DIR__.'/../model/Place.php';
require_once __DIR__.'/../model/PlaceMapper.php';

class MapController extends AppController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function map()
    {
        $mapper = new PlaceMapper();
        $this->render('map', ['places' => $mapper->get_places()]);
    }

    public function add_location()
    {
        $mapper = new PlaceMapper();
        $place = null;
        $place_added = false;

        if ($this->isPost()) {
            $place = new Place(
                $_POST['name'],
                $_POST['address'],
                $_POST['latitude'],
                $_POST['longtitude'],
                $_POST['email'],
                $_POST['url'],
            );
            $mapper->set_place($place);

            $place_added = true;
            $this->render('map', [
                'message' => ['Place successfully added!.']
            ]);
        }
        if(!$place_added) $this->render('add_location');
    }
}