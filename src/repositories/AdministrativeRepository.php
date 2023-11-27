<?php

namespace src\repositories;

use src\database\models\Administrador;

class AdministrativeRepository extends BaseRepository
{
    function __construct(Administrador $administrador = null)
    {
        $this->setModel($administrador ?? (new Administrador));
    }

    /**
     * Responsible for seeking the supplier according to the document (cnpj)
     * @param string $documentRaw
     * @return ?object
     */
    function getByDocument(string $user_key): ?object
    {
        return $this->byColumn("user_key", "=", "'{$user_key}'")->get();
    }

    /**
     * Responsible for verifying that the data of the Reset form is valid.If there is a registration with the registration and the email informed.
     * 
     * @param array $dataFromForm
     * @return ?Administrador
     */
    function canReset(string $userKey, string $email): ?Administrador
    {
        return $this->select(["*"])->where(
            column: "user_key",
            operator: "=",
            value: "'{$userKey}'",
            logic: "AND"
        )->where(
            column: "email",
            operator: "=",
            value: "'{$email}'"
        )->done()?->results;
    }

    function getByUserKey(string $userKey): ?object
    {
        return $this->byColumn("user_key", "=", "'{$userKey}'")->get();
    }
}
