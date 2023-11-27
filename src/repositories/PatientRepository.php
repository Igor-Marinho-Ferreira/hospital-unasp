<?php

namespace src\repositories;

use src\database\models\Patient;

class PatientRepository extends BaseRepository
{
    function __construct(Patient $patient = null)
    {
        $this->setModel($patient ?? (new Patient));
    }

    function getByUserKey(string $userKey): ?object
    {
        return $this->byColumn("name", "=", "'{$userKey}'")->get();
    }

    /**
     * Responsible for seeking the supplier according to the document (cnpj)
     * @param string $documentRaw
     * @return ?object
     */
    function getByDocument(string $user_key): ?object
    {
        return $this->byColumn("name", "=", "'{$user_key}'")->get();
    }
}
