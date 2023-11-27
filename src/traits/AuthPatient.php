<?php

namespace src\traits;
use src\core\Response;
use src\services\PatientService;
use src\requests\user\LoginRequest;

trait AuthPatient
{
    /**
     * Responsible for presenting the Administrative Login View
     * @return Response
     */
    function authLogin(): Response
    {
        patientIsLoggedRedirect(PATIENT_DASHBOARD);
        return Response::viewRender("authentication/user/login", []);
    }

    /**
     * Responsible for receiving the post requisition of the administrative area login form and authenticating the user in the system.
     * 
     * @param LoginRequest $loginRequest
     */
    function authLoginStore(LoginRequest $loginRequest)
    {
        if (!(new PatientService)->authenticate($loginRequest->inputs())){
            return Response::backError(LOGIN_FAILED);
        }
        return Response::redirect(PATIENT_DASHBOARD);
    }

    /**
    * Responsible for performing the user logout from the system
    * @param int $userId
    * @return Response Return to the previous page or the login page
    */
    function authLogout(int $userId)
    {
        if ($userId !== user("id"))
            return Response::redirect(AUTH . AUTH_LOGIN_PATIENT);

        forgetSessions([AUTHENTICATION_SESS]);
        return Response::redirect(AUTH . AUTH_LOGIN_PATIENT, [
            "message" => LOGOUT_DONE,
            "type" => MESSAGE_SUCCESS
        ]);
    }
}
