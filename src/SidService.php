<?php

namespace Massfice\AuthAction;

use Massfice\Service\ServiceObject;
use Massfice\Service\ServiceData;

class SidService implements ServiceObject {
    public $sid;

    public function url(array $data) : string {
        return "http://localhost/social-authenticator/sid/json";
    }

    public function prepare(&$curl) {
        curl_setopt($curl, CURLOPT_COOKIEJAR, "cookie.jar");
        curl_setopt($curl, CURLOPT_COOKIEFILE, "cookie.jar");
    }

    public function data(array $data) : ?ServiceData {
        return null;
    }

    public function callback(int $code, array $exec) {
        $this->sid = $exec["data"]["sid"];
    }
}

?>