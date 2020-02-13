<?php

use Massfice\Smart\Import;
use Massfice\AuthAction\AuthJsonAction as aja;
use Massfice\AuthAction\AuthHtmlAction as aha;
require_once(Import::option("Massfice\\Action\\","ActionCreator"));

abstract class AuthJsonAction extends aja {
    abstract protected function getVerifyStatus(array $data) : \VerifyStatus;
    abstract public function load(array $data, array $config) : array;
    abstract public function validate(array $data) : \ResponseStatus;
    abstract public function execute(array $data) : array;
}

abstract class AuthHtmlAction extends AuthJsonAction implements \HtmlAction {
    abstract public function onDisplay(array $data);
    abstract public function onError(array $data);
}

?>