<?php

require_once 'Place.php';
require_once __DIR__.'/../Database.php';

class PlaceMapper
{
    private $database;

    public function __construct()
    {
        $this->database = new Database();
    }

    public function get_places()
    {
        try {
            $stmt = $this->database->connect()->prepare('SELECT * FROM food_places;');
            $stmt->bindParam(':email', $_SESSION['id'], PDO::PARAM_STR);
            $stmt->execute();

            $places = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $places;
        }
        catch(PDOException $e) {
            die();
        }
    }

    public function set_place(Place $place): void
    {
        $name = $place->getName();
        $address = $place->getAddress();
        $lat = $place->getLat();
        $lng = $place->getLng();
        $type = $place->getType();
        $email_address = $place->getEmail();
        $webpage = $place->getWebpage();

        try {
            $stmt = $this->database->connect()->prepare('
                INSERT INTO `food_places` (`name`, `address`, `lat`, `lng`, `type`, `email_address`, `webpage`) 
                VALUES (:name, :address, :lat, :lng, :type, :email_address, :webpage);
            ');
            $stmt->bindParam(':name', $name, PDO::PARAM_STR);
            $stmt->bindParam(':address', $address, PDO::PARAM_STR);
            $stmt->bindParam(':lat', $lat, PDO::PARAM_STR);
            $stmt->bindParam(':lng', $lng, PDO::PARAM_STR);
            $stmt->bindParam(':type', $type, PDO::PARAM_STR);
            $stmt->bindParam(':email_address', $email_address, PDO::PARAM_STR);
            $stmt->bindParam(':webpage', $webpage, PDO::PARAM_STR);
            $stmt->execute();
        } catch (PDOException $e) {
            die();
        }
    }
}
