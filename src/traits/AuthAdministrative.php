<?php

namespace src\traits;

use src\core\Request;
use src\core\Response;
use src\services\AdministrativeService;
use src\requests\administrative\ConfirmRequest;
use src\requests\administrative\LoginRequest;
use src\requests\administrative\ResetRequest;
use src\services\ResetService;

trait AuthAdministrative
{
    /**
     * Responsible for presenting the Administrative Login View
     * @return Response
     */
    function authLogin(): Response
    {
        administrativeIsLoggedRedirect(ADMINISTRATIVE_DASHBOARD);
        return Response::viewRender("authentication/administrative/login", []);
    }

    /**
     * Responsible for receiving the post requisition of the administrative area login form and authenticating the user in the system.
     * 
     * @param LoginRequest $loginRequest
     */
    function authLoginStore(LoginRequest $loginRequest)
    {
        if (!(new AdministrativeService)->authenticate($loginRequest->inputs())){
            return Response::backError(LOGIN_FAILED);
        }
        return Response::redirect(ADMINISTRATIVE_DASHBOARD);
    }

    /**
     * Responsible for performing the user logout from the system
     * @param int $userId
     * @return Response Return to the previous page or the login page
     */
    function authLogout(int $userId)
    {
        if ($userId !== user("id"))
            return Response::redirect(AUTH . AUTH_LOGIN_ADMINISTRATIVE);

        forgetSessions([AUTHENTICATION_SESS]);
        return Response::redirect(AUTH . AUTH_LOGIN_ADMINISTRATIVE, [
            "message" => 'LOGOUT_DONE',
            "type" => MESSAGE_SUCCESS
        ]);
    }

    /**
     * Responsible for showing View that contains the form for password recovery
     * @return Response
     */
    function authReset()
    {
        administrativeIsLoggedRedirect(ADMINISTRATIVE_DASHBOARD);
        return Response::viewRender("authentication/administrative/reset", []);
    }

    /**
     * Responsible for receiving reset form data, checking if the data is valid, send the email and if all happens successfully, take to the code confirmation view to reset.
     * 
     * @param ResetRequest $resetRequest
     * @return Response View containing the form for confirmation of the code
     */
    function authResetStore(ResetRequest $resetRequest)
    {
        $administrativeService = new AdministrativeService;
        $administrative = $administrativeService->canReset($resetRequest->inputs());

        if (!$administrative) {
            setSession(SESS_OLD, $resetRequest->inputs());
            return Response::back(["message" => 'ACCOUNT_EMPTY', "type" => MESSAGE_ERROR]);
        }


        $administrativeService->sendPassKey($administrative) ?
            notiflixNotify('PASSWORD_EMAIL_SENDED', MESSAGE_SUCCESS)
            :
            notiflixNotify('PASSWORD_EMAIL_FAILED', MESSAGE_ERROR);

        return Response::redirect(AUTH . AUTH_RESET_ADMINISTRATIVE);
    }

        /**
     * Responsible for displaying the password change form
     * @return Response
     */
    function authResetConfirm()
    {
        administrativeIsLoggedRedirect(ADMINISTRATIVE_DASHBOARD);
        ["hash" => $hash, "userKey" => $userKey] = Request::queryParams();

        if (
            !empty($hash) &&
            !empty($userKey) &&
            (new ResetService)->getByUserKeyHash($hash, $userKey)
        ) {
            setSession(AUTHENTICATION_RESET_SESS_ADMINISTRATIVE, $userKey, 1);
            return Response::viewRender("authentication/administrative/confirm", []);
        }

        return Response::redirect(AUTH_RESET_ADMINISTRATIVE, [
            "message" => 'LINK_IS_BROKEN',
            "type" => MESSAGE_ERROR
        ]);
    }

/**
     * Responsible for managing the user's password exchange
     * @param ConfirmRequest $confirmRequest
     * @return Response
     */
    function authResetConfirmStore(ConfirmRequest $confirmRequest): Response
    {
        $password = $confirmRequest->input("password");
        $passwordVerify = $confirmRequest->input("password_verify");

        if ($password !== $passwordVerify)
            return Response::back([
                "message" => 'PASSWORD_WRONG',
                "type" => MESSAGE_ERROR
            ]);



        $userKey = getSession(AUTHENTICATION_RESET_SESS_ADMINISTRATIVE);
        if (
            empty($userKey) ||
            !(new AdministrativeService)->updatePassword($userKey, $password) ||
            !(new ResetService)->disableActive($userKey)
        )
            return Response::back([
                "message" => 'PASSWORD_PROBLEM_SERVER',
                "type" => MESSAGE_ERROR
            ]);


        return Response::redirect(AUTH . AUTH_LOGIN_ADMINISTRATIVE, [
            "message" => 'PASSWORD_DONE_SERVER',
            "type" => MESSAGE_SUCCESS
        ]);
    }
}
