<?php
require_once 'Parameters.php';

require_once __DIR__.'/../model/Place.php';
require_once __DIR__.'/../model/PlaceMapper.php';
require_once __DIR__.'/../model/User.php';
require_once __DIR__.'/../model/UserMapper.php';

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
        $usermapper = new UserMapper();

        $user = $usermapper->getUser($_SESSION['email']);
        $place = null;
        $place_added = false;

        if ($this->isPost()) {
            $place = new Place(
                $_POST['name'],
                $_POST['address'],
                $_POST['latitude'],
                $_POST['longitude'],
                $_POST['email'],
                $_POST['url'],
            );
            $place->setAddedByUser($user->getId());
            $mapper->set_place($place);

            $place_added = true;
            $this->render('map', [
                'message' => ['Place successfully added!.']
            ]);
        }
        if(!$place_added) $this->render('add_location');
    }

    public function get_places(): void
    {
        $place = new PlaceMapper();

        header('Content-type: application/json');
        http_response_code(200);

        echo $place->get_places_created_by_user() ? json_encode($place->get_places_created_by_user()) : '';

    }
}