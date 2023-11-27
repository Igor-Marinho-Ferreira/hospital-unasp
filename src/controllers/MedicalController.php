<?php

namespace src\controllers;

use DateTime;
use src\core\Request;
use src\core\Response;
use src\services\MedicalService;
use src\services\DepartmentsService;
use src\requests\administrative\Medical\StoreRequest;
use src\requests\administrative\Medical\UpdateRequest;
use src\traits\AuthMedical;

class MedicalController
{
    use AuthMedical;
    /**
    * Responsible for presenting the view of the administrative panel
    * @return Response
    */
    function dashboard(): Response
    {
        medicalIsntLoggedRedirect();
        return Response::viewRender("medical/dashboard");
    }   

    /**
     * Responsible for returning to the initial view with the list of rooms
     * @return Response
     */
    function index(): Response
    {
        administrativeIsntLoggedRedirect();
        $queryParam = Request::query("q");
        $findAll = $queryParam ?
            (new MedicalService)->filter($queryParam) :
            $findAll = (new MedicalService)->all();
        $departments = (new DepartmentsService)->allOptions();
        return Response::viewRender("administrative/medical/index", [
            "medicals" => $findAll?->results,
            "pagination" => $findAll?->paginate?->links,
            "searchArgument" => $queryParam,
            "departments" => $departments
        ]);
    }

    /**
    * Responsible for registering user
    * @param StoreRequest $request
    * @return Response
    */
    function store(StoreRequest $request): Response
    {
        if ((new MedicalService)->getByUserKey($request->input("name")))
            return Response::backError(ROOMS_REGISTERED_FAILED);
        if (!(new MedicalService)->save($request->inputs()))
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
        if ((new MedicalService)->update($request->inputs()))
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

        if (!(new MedicalService)->updateStatus($id, $enableOrDisable))
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
        $doctors = (new MedicalService)->findById($id);
        if (!$doctors)
            return Response::json([
                "message" => "falha",
                "message4Devs" => "falha",
                "data" => []
            ], 404);

        return Response::json([
            "message" => "Deu certo",
            "message4Devs" => "Deu certo",
            "data" => array_only((array) $doctors, ["id", "name", "lastname", "email", "departments_id",  "specialty", "telephone", "status"])
        ], 200);
    }

    /**
     * Responsible for updating the status of the user
     * @return Response
     */
    function destroy(): Response
    {
        $id = Request::query("id");
        (new MedicalService)->destroy($id);

        return Response::json([
            "message" => "teste",
            "message4Devs" => "teste",
            "data" => []
        ], 200);
    }
}
