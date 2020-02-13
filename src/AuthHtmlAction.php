<?php

namespace Massfice\AuthAction;

use Massfice\Action\HtmlAction;

abstract class AuthHtmlAction extends AuthJsonAction implements HtmlAction {
    abstract public function onDisplay(array $data);
    abstract public function onError(array $data);
}

?>