<?php

namespace src\controllers;

use src\core\Response;
use src\traits\AuthAdministrative;
use src\services\MedicalService;

class AdministrativeController
{
    use AuthAdministrative;

    /**
     * Responsible for presenting the view of the administrative panel
     * @return Response
     */
    function dashboard(): Response
    {
        administrativeIsntLoggedRedirect();
        $medical = (new MedicalService)->allOptions();
        return Response::viewRender("administrative/dashboard",[
            "medical" => $medical
        ]);
    }
    
}
