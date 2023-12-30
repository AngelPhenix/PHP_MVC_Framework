<?php

namespace app\core;

class Application {

    /* We want a $router variable that's of type "Router" */
    public Router $router;

    public function __construct() {
        $this->router = new Router();
    }
}