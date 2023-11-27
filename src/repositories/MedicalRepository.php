<?php

namespace src\repositories;

use src\database\models\Medical;

class MedicalRepository extends BaseRepository
{
    function __construct(Medical $medical = null)
    {
        $this->setModel($medical ?? (new Medical));
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
