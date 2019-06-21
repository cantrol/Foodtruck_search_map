<?php

require_once 'controllers/DefaultController.php';
require_once 'controllers/MapController.php';
require_once 'controllers/AdminController.php';
require_once 'controllers/AdminController.php';

class Routing
{
    public $routes = [];

    public function __construct()
    {
        $this->routes = [
            'index' => [
                'controller' => 'DefaultController',
                'action' => 'index'
            ],
            'login' => [
                'controller' => 'DefaultController',
                'action' => 'login'
            ],
            'logout' => [
                'controller' => 'DefaultController',
                'action' => 'logout'
            ],
            'register' => [
                'controller' => 'DefaultController',
                'action' => 'register'
            ],
            'upload' => [
                'controller' => 'UploadController',
                'action' => 'upload'
            ],
            'map' => [
                'controller' => 'MapController',
                'action' => 'map'
            ],
            'add_location' => [
                'controller' => 'MapController',
                'action' => "add_location"
            ],
            'get_places_of_user' => [
                'controller' => 'MapController',
                'action' => 'get_places_of_user'
            ],
            'get_all_places' => [
                'controller' => 'MapController',
                'action' => 'get_all_places'
            ],
            'delete_place' => [
                'controller' => 'MapController',
                'action' => 'placeDelete'
            ],
            'admin' => [
                'controller' => 'AdminController',
                'action' => 'index'
            ],
            'admin_users' => [
                'controller' => 'AdminController',
                'action' => 'users'
            ],
            'admin_delete_user' => [
                'controller' => 'AdminController',
                'action' => 'userDelete'
            ]
        ];
    }

    public function run()
    {
        $page = isset($_GET['page'])
            && isset($this->routes[$_GET['page']]) ? $_GET['page'] : 'index';

        if ($this->routes[$page]) {
            $class = $this->routes[$page]['controller'];
            $action = $this->routes[$page]['action'];

            $object = new $class;
            $object->$action();
        }
    }

}