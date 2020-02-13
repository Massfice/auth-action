<?php

namespace Massfice\AuthAction;

class StandartLocation implements Location {
    public function getLocation() : string {
        $location = $_SERVER["REQUEST_SCHEME"]."://".$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"];
        $location = str_replace("&","%26",$location);
        return $location;
    }
}

?>