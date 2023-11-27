<?php

namespace src\services;

use src\repositories\AdministrativeRepository;
use src\database\models\Administrador;
use src\support\Mailer;

class AdministrativeService
{
    /**
     * Check if there is any user registered with the registration provided and later validated the password, if it is ok, will create the "authentication" session.
     * 
     * @param array $dataFromForm
     * @return ?array
     */
    function authenticate(array $dataFromForm): ?array
    {
        ["user_key" => $user_key, "password" => $password] = $dataFromForm;
        $administrative = (new AdministrativeRepository())->getByDocument($user_key);
        if (!$administrative or $administrative->deleted_at)
            return null;
        // dd($password, $administrative->password);
        return password_verify($password, $administrative->password) ?
            setSession(
                AUTHENTICATION_SESS,
                array_only((array) $administrative, [
                    "id",
                    "name",
                    "email",
                    "user_key",
                    "password"
                ]),
                1
            ) :
            null;
    }

    /**
    * Responsible for verifying that the data of the Reset form is valid.If there is a registration with the registration and the email informed.
    * 
    * @param array $dataFromForm
    * @return ?Administrador
    */
    function canReset(array $dataFromForm): ?Administrador
    {
        $handled = array_map("trim", $dataFromForm);
        ["user_key" => $userKey, "email" => $email] = $handled;
        return (new AdministrativeRepository())->canReset($userKey, $email);
    }

    /**
    * Send the password recovery email
    * @param Administrador $administrador
    * @return bool
    */
    function sendPassKey(Administrador $administrador): bool
    {
        $resetService = (new ResetService);

        if ($resetSession = $resetService->save(
            $administrador->user_key,
            $administrador->email
        )) {
            setSession("resetSession", $resetSession, 1);

            if ($idFromLastReset = $resetService->getIdLastReset($administrador, $resetSession["hash_reset"]))
                $resetService->invalidateReset($idFromLastReset);


            return (new Mailer(fromName: "Unasp - Hospital"))
                ->setAddressees([$administrador->email])
                ->setSubject("UNASP - alteração de senha")
                ->setBody($resetService->getResetEmail())
                ->fire();
        } else
            return false;
    }

    /**
     * Responsible for obtaining an employee according to registration
     * @param string $userKey
     * @return ?object
     */
    function getByUserKey(string $userKey): ?object
    {
        return (new AdministrativeRepository())->getByUserKey($userKey);
    }


    /**
     * Updates the user's password
     * @param string $userKey User Registration
     * @param string $password New password that will be encrypted and saved
     * 
     * @return bool
     */
    function updatePassword(string $userKey, string $password): bool
    {
        $class = $this->getByUserKey($userKey);
        $class->password = password_hash($password, PASSWORD_DEFAULT);
        return (new AdministrativeRepository($class))->save();
    }
}
