<?php

namespace Massfice\AuthAction;

use Massfice\Action\JsonAction;
use Massfice\Action\HtmlAction;
use Massfice\Action\VerifyStatus;
use Massfice\ResponseStatus\ResponseStatusFactory;
use Massfice\ResponseStatus\ResponseStatus;
use Massfice\Service\ServiceExecutor;

use Massfice\Action\Standart\SeeOther;

abstract class AuthJsonAction implements JsonAction {

    protected function getSid() : SidService {
        $sid = new SidService();
        $sid = ServiceExecutor::execute($sid);
        return $sid;
    }

    protected function getAuth(SidService $sid) : AuthService {
        $auth = new AuthService();
        $auth = ServiceExecutor::execute($auth,[
            "sid" => $sid
        ]);
        return $auth;
    }

    public function verify() : VerifyStatus {
        $sid = $this->getSid();
        $auth = $this->getAuth($sid);
        if(!$auth->auth || $auth->code == 401) {
            $status = new VerifyStatus(false);
            $location = $auth->redirect;
            $location = str_replace("{sid}",$sid->sid,$location);
            $location = str_replace("{redirect}",Redirect::getInstance()->getLocation()->getLocation(),$location);
            $status->setSubstitut(new SeeOther($location));
            return $status;
        }

        return $this->getVerifyStatus($auth->data);
    }

    abstract protected function getVerifyStatus(array $data) : VerifyStatus;
    abstract public function load(array $data, array $config) : array;
    abstract public function validate(array $data) : ResponseStatus;
    abstract public function execute(array $data) : array;


}

?>