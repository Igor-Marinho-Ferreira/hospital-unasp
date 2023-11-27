<?php

namespace src\controllers;

use src\core\Response;
use src\traits\AuthPatient;

class UserController
{
    use AuthPatient;
    /**
     * Responsible for presenting the view of the administrative panel
     * @return Response
     */
    function dashboard(): Response
    {
        patientIsntLoggedRedirect();
        return Response::viewRender("user/dashboard");
    }   
}
