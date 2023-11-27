<?php

namespace src\controllers;

use src\core\Response;

class HomeController
{
    /**
     * Responsible for performing the redirection for the login
     * @return void
     */
    function redirect(): void
    {
        Response::redirect(AUTH . AUTH_LOGIN_ADMINISTRATIVE);
    }
}
