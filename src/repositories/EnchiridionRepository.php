<?php

namespace src\repositories;

use src\database\models\Enchiridion;

class EnchiridionRepository extends BaseRepository
{
    function __construct(Enchiridion $enchiridion = null)
    {
        $this->setModel($enchiridion ?? (new Enchiridion));
    }
}
