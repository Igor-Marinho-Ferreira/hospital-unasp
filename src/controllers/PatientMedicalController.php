<?php

namespace src\controllers;

use DateTime;
use src\core\Request;
use src\core\Response;
use src\services\PatientService;
use src\requests\administrative\Patient\StoreRequest;
use src\requests\administrative\Patient\UpdateRequest;

class PatientMedicalController
{
    /**
     * Responsible for returning to the initial view with the list of rooms
     * @return Response
     */
    function index(): Response
    {
        medicalIsntLoggedRedirect();
        $queryParam = Request::query("q");
        $findAll = $queryParam ?
            (new PatientService)->filter($queryParam) :
            $findAll = (new PatientService)->all();
        return Response::viewRender("medical/patient/index", [
            "patients" => $findAll?->results,
            "pagination" => $findAll?->paginate?->links,
            "searchArgument" => $queryParam,
        ]);
    }

    /**
    * Responsible for registering user
    * @param StoreRequest $request
    * @return Response
    */
    function store(StoreRequest $request): Response
    {
        if ((new PatientService)->getByUserKey($request->input("name")))
            return Response::backError(ROOMS_REGISTERED_FAILED);
        if (!(new PatientService)->save($request->inputs()))
            return Response::backError(ROOMS_REGISTERED_FAILED);

        return Response::backSuccess(ROOMS_CREATED);
    }

    /**
     * Responsible for updating user data
     * @param UpdateRequest $request
     * @return Response
     */
    function update(UpdateRequest $request): Response
    {
        if ((new PatientService)->update($request->inputs()))
            return Response::backSuccess(DEPARTMENTS_UPDATE);
        else
            return Response::backError(DEPARTMENTS_UPDATE_FAILED);
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

        if (!(new PatientService)->updateStatus($id, $enableOrDisable))
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

    /**
    * API to search for user data
    * This metod is responsible for taking the data to the change modal
    */
    function find(int $id)
    {
        $nurse = (new PatientService)->findById($id);
        if (!$nurse)
            return Response::json([
                "message" => "falha",
                "message4Devs" => "falha",
                "data" => []
            ], 404);

        return Response::json([
            "message" => "Deu certo",
            "message4Devs" => "Deu certo",
            "data" => array_only((array) $nurse, ["id", "name", "lastname", "email", "cpf", "dath_birth", "telephone", "cep", "street", "number_home", "city", "state", "status"])
        ], 200);
    }

    /**
     * Responsible for updating the status of the user
     * @return Response
     */
    function destroy(): Response
    {
        $id = Request::query("id");
        (new PatientService)->destroy($id);

        return Response::json([
            "message" => "teste",
            "message4Devs" => "teste",
            "data" => []
        ], 200);
    }
}
