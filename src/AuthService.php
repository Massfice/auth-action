<?php

namespace Massfice\AuthAction;

use Massfice\Service\ServiceObject;
use Massfice\Service\ServiceData;

class AuthService implements ServiceObject {
    public $redirect;
    public $code;
    public $auth;
    public $data;

    public function url(array $data) : string {
        $sid = isset($data["sid"]) ? "/?sid=".$data["sid"]->sid : "";
        return "http://localhost/social-authenticator/auth/json".$sid;
    }

    public function prepare(&$curl) {
    }

    public function data(array $data) : ?ServiceData {
        return null;
    }

    public function callback(int $code, array $exec) {
        $this->auth = $exec["data"]["auth"];
        $this->redirect = isset($exec["data"]["details"]["redirectTo"]) ? $exec["data"]["details"]["redirectTo"] : null;
        $this->code = $code;
        if(isset($exec["data"]["details"]["redirectTo"])) unset($exec["data"]["details"]["redirectTo"]);
        if(isset($exec["data"]["details"]["redirectMethod"])) unset($exec["data"]["details"]["redirectMethod"]);
        $this->data = $exec["data"]["details"];
    }
}

?>