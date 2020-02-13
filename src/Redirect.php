<?php

namespace Massfice\AuthAction;

class Redirect {
    private static $instance;
    private $location;

    private function __construct() {
        $this->setLocation(new StandartLocation());
    }

    public static function getInstance() : self {
        if(!isset(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function setLocation(Location $location) {
        $this->location = $location;
    }

    public function getLocation() : Location {
        return $this->location;
    }
}

?>