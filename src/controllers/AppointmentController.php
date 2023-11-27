<?php

namespace src\controllers;

use src\core\Response;
use src\services\MedicalService;
use src\services\AppointmentService;
use src\requests\user\Appointment\StoreRequest;
use src\core\Request;

class AppointmentController
{
    /**
     * Responsible for returning to the initial view with the list of rooms
     * @return Response
     */
    function index(): Response
    {
        patientIsntLoggedRedirect();
        $medical = (new MedicalService)->allOptions();
        $queryParam = Request::query("q");
        $findAll = $queryParam ?
            (new AppointmentService)->filter($queryParam) :
            $findAll = (new AppointmentService)->all();
        return Response::viewRender("user/appointment/index",[
            "medical" => $medical,
            "appointments" => $findAll?->results,
            "pagination" => $findAll?->paginate?->links,
            "searchArgument" => $queryParam
        ]);
    }

    /**
    * Responsible for registering user
    * @param StoreRequest $request
    * @return Response
    */
    function store(StoreRequest $request): Response
    {
        if (!(new AppointmentService)->save($request->inputs()))
            return Response::backError(ROOMS_REGISTERED_FAILED);

        return Response::backSuccess(ROOMS_CREATED);
    }

}
