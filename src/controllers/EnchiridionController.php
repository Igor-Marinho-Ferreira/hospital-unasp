<?php

namespace src\controllers;

use DateTime;
use src\core\Request;
use src\core\Response;
use src\requests\medical\Enchiridion\StoreRequest;
use src\services\PatientService;
use src\services\EnchiridionService;
use src\services\NurseService;

class EnchiridionController
{
    /**
     * Responsible for returning to the initial view with the list of rooms
     * @return Response
     */
    function index(): Response
    {
        // medicalIsntLoggedRedirect();
        $patient = (new PatientService)->allOptions();
        $nurse = (new NurseService)->allOptions();
        return Response::viewRender("medical/enchiridion/index", [
            "patient" => $patient,
            "nurses" => $nurse
        ]);
    }

    /**
    * Responsible for registering user
    * @param StoreRequest $request
    * @return Response
    */
    function store(StoreRequest $request): Response
    {
        if (!(new EnchiridionService)->save($request->inputs()))
            return Response::backError(ROOMS_REGISTERED_FAILED);

        return Response::backSuccess(ROOMS_CREATED);
    }
}
