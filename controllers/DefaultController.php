<?php

require_once "AppController.php";

require_once __DIR__.'/../model/User.php';
require_once __DIR__.'/../model/UserMapper.php';


class DefaultController extends AppController
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $text = 'Hello there 👋';

        $this->render('index', ['text' => $text]);
    }

    public function login()
    {
        $mapper = new UserMapper();

        $user = null;

        if ($this->isPost()) {

            $user = $mapper->getUser($_POST['email']);

            if(!$user) {
                return $this->render('login', ['message' => ['Email not recognized']]);
            }

            if ($user->getPassword() !== md5($_POST['password'])) {
                return $this->render('login', ['message' => ['Wrong password']]);
            } else {
                $_SESSION["email"] = $user->getEmail();
                $_SESSION["role"] = $user->getRole();
                $_SESSION['id'] = $user->getId();

                $url = "http://$_SERVER[HTTP_HOST]/";
                header("Location: {$url}?page=index");
                exit();
            }
        }

        $this->render('login');
    }

    public function logout()
    {
        session_unset();
        session_destroy();

        $this->render('index', ['text' => 'You have been successfully logged out!']);
    }

    public function register()
    {
        $mapper = new UserMapper();
        $user = null;
        $place_added = false;

        if ($this->isPost()) {
            $user = new User(
              $_POST['name'],
              $_POST['surname'],
              $_POST['email'],
              md5($_POST['password']),
              $_POST['ID'] = 0,
              $_POST['role']="ROLE_USER"
            );
            $mapper->setUser($user);
            $place_added = true;
            $this->render('login', [
                'message' => ['You have been successful registered! Please login.']
                ]);
        }

        if(!$place_added) $this->render('register');
    }
}