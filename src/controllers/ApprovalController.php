<?php

namespace src\controllers;

use DateTime;
use src\core\Response;
use src\core\Request;
use src\services\AppointmentService;
use src\services\ApprovalService;

class ApprovalController
{
    /**
     * Responsible for returning to the initial view with the list of rooms
     * @return Response
     */
    function index(): Response
    {
        $appointments = (new AppointmentService)->allOptions();
        return Response::viewRender("medical/approval/index",[
            "appointments" => $appointments
        ]);
    }

    /**
     * Responsible for updating the status of the user
     * @return Response
     */
    function updateStatus(): Response
    {
        $id = Request::query("id");
        $enableOrDisable = (Request::query("status") === "enable") ? null : (new DateTime())->format("Y-m-d H:i:s");

        if (!$id)
            return Response::json([
                "message" => DEPARTMENTS_UPDATE_STATUS_ID_MISSING,
                "message4Devs" => DEPARTMENTS_UPDATE_STATUS_ID_MISSING_4_DEVS
            ], 400);

        if (!(new ApprovalService)->updateStatus($id, $enableOrDisable))
            return Response::json([
                "message" => DEPARTMENTS_UPDATE_STATUS_ERROR_SERVER,
                "message4Devs" => DEPARTMENTS_UPDATE_STATUS_ERROR_SERVER_4_DEVS,
                "data" => []
            ], 500);


        return Response::json([
            "message" => DEPARTMENTS_UPDATE_STATUS_SUCCESS,
            "message4Devs" => DEPARTMENTS_UPDATE_STATUS_SUCCESS,
            "data" => []
        ], 200);
    }
}
