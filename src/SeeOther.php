<?php

namespace Massfice\AuthAction;

use Massfice\Action\HtmlAction;
use Massfice\Action\VerifyStatus;
use Massfice\ResponseStatus\ResponseStatus;
use Massfice\ResponseStatus\ResponseStatusFactory;

class SeeOther implements HtmlAction {
    private $location;

    public function __construct(string $location) {
        $this->location = $location;
    }

    public function verify() : VerifyStatus {
        return new VerifyStatus();
    }

    public function load(array $data, array $config) : array {
        return [];
    }

    public function validate(array $data) : ResponseStatus {
        $status = ResponseStatusFactory::create(303);
        $status->setLocation($this->location);
        return $status;
    }

    public function execute(array $data) : array {
        return $data;
    }

    public function onDisplay(array $data) {

    }

    public function onError(array $errors) {
        
    }
}

?>