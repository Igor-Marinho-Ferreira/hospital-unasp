<?php

namespace src\repositories;

use src\database\models\Appointment;

class AppointmentRepository extends BaseRepository
{
    function __construct(Appointment $appointment = null)
    {
        $this->setModel($appointment ?? (new Appointment));
    }
}
