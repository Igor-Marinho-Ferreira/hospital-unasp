<?php

namespace src\repositories;

use src\database\models\Departments;

class DepartmentsRepository extends BaseRepository
{
    function __construct(Departments $departments = null)
    {
        $this->setModel($departments ?? (new Departments));
    }
}
