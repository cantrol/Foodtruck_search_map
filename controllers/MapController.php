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
        $this->render('map', ['places' => $mapper->get_all_places()]);
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

    public function get_places_of_user(): void
    {
        $places = new PlaceMapper();

        header('Content-type: application/json');
        http_response_code(200);

        echo $places->get_places_of_user() ? json_encode($places->get_places_of_user()) : '';

    }

    public function get_all_places(): void
    {
        $place = new PlaceMapper();

        header('Content-type: application/json');
        http_response_code(200);

        echo $place->get_all_places() ? json_encode($place->get_all_places()) : '';

    }

    public function placeDelete(): void
    {
        if (!isset($_POST['id'])) {
            http_response_code(404);
            return;
        }

        $user = new PlaceMapper();
        $user->deletePlace((int)$_POST['id']);

        http_response_code(200);
    }
}