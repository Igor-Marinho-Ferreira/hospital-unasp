<?php

namespace src\services;

use src\database\models\Appointment;
use src\repositories\AppointmentRepository;


class ApprovalService
{
    /**
     * Responsible for updating status from user
     * @param string $status
     * @return ?bool
     */
    function updateStatus(int $id, ?string $status): ?bool
    {
        return (new AppointmentRepository(
            (new Appointment)->fill([
                "id" => $id,
                "deleted_at" => $status
            ])
        ))->save();
    }
}
