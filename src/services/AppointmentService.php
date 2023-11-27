<?php

namespace src\services;

use DateTime;
use src\database\models\Appointment;
use src\repositories\AppointmentRepository;
use src\repositories\BaseRepository;

class AppointmentService
{
    /**
     * Save Verification data to the database.
     *
     * @param array $data The data to be saved.
     * @return mixed The result of the save operation.
     */
    public function save(array $data)
    {
        $data['status'] === 'Y' ? $data['deleted_at'] = null :  $data['deleted_at'] = (new DateTime())->format("Y-m-d H:i:s"); 
        if ((new AppointmentRepository(
            (new Appointment)->fill($data)
        ))->save()) {
            return $this->lastInserted();
        }
    }

    /**
     * Get the ID of the last inserted Verification record.
     *
     * @return mixed The ID of the last inserted record.
     */
    public function lastInserted()
    {
        // Retrieve the last inserted ID from the repository
        return (new AppointmentRepository)->getLastInsertedId();
    }
    
    public function filter(string $queryParam): ?BaseRepository
    {
        $queryParamTrim = trim($queryParam);
        return (new AppointmentRepository())->filterAppointments($queryParamTrim);
    }

    /**
     * Responsible for seeking all users
     * @return ?BaseRepository
     */
    public function all(): ?BaseRepository
    {
        return (new AppointmentRepository())->allWithPaginate();
    }

    /**
     * Responsible for seeking all registered groups
     * @return ?array
     */
    function allOptions()
    {
        return (new AppointmentRepository())->all()?->results;
    }
}
