<?php

namespace src\services;

use DateTime;
use src\database\models\Departments;
use src\repositories\BaseRepository;
use src\repositories\DepartmentsRepository;

class DepartmentsService
{
    /**
     * Responsible for seeking all users
     * @return ?BaseRepository
     */
    public function all(): ?BaseRepository
    {
        return (new DepartmentsRepository())->allWithPaginate();
    }

    /**
     * Responsible for seeking all registered groups
     * @return ?array
     */
    function allOptions()
    {
        return (new DepartmentsRepository())->all()?->results;
    }

    /**
     * Save Verification data to the database.
     *
     * @param array $data The data to be saved.
     * @return mixed The result of the save operation.
     */
    public function save(array $data)
    {
        $data['status'] === 'Y' ? $data['deleted_at'] = null :  $data['deleted_at'] = (new DateTime())->format("Y-m-d H:i:s"); 
        if ((new DepartmentsRepository(
            (new Departments)->fill($data)
        ))->save()) {
            return $this->lastInserted();
        }
    }

    /**
    * Responsible for updating user data
    * @param array $dataFromForm
    * @return ?bool
    */
    function update(array $dataFromForm): ?bool
    {
        $dataFromForm['status'] === 'Y' ? $dataFromForm['deleted_at'] = null :  $dataFromForm['deleted_at'] = (new DateTime())->format("Y-m-d H:i:s"); 
        return (new DepartmentsRepository(
            (new Departments)->fill($dataFromForm)
        ))->save();
    }

    /**
     * Responsible for updating status from user
     * @param string $status
     * @return ?bool
     */
    function updateStatus(int $id, ?string $status): ?bool
    {
        return (new DepartmentsRepository(
            (new Departments)->fill([
                "id" => $id,
                "deleted_at" => $status
            ])
        ))->save();
    }

    function destroy($id)
    {
        if ((new DepartmentsRepository(
            (new Departments)->fill([
                "id" => $id
            ])
        ))->destroy());
    }

    /**
     * Get the ID of the last inserted Verification record.
     *
     * @return mixed The ID of the last inserted record.
     */
    public function lastInserted()
    {
        // Retrieve the last inserted ID from the repository
        return (new DepartmentsRepository)->getLastInsertedId();
    }

    /**
     * Responsible for seeking users by ID
     * @param int $id
     * @return ?object
     */
    function findById(int $id): ?object
    {
        return (new DepartmentsRepository())->byId($id)?->results;
    }

    /**
     * Responsible for seeking all users using filter
     * @param string $queryParam
     * @return ?BaseRepository
     */
    public function filter(string $queryParam): ?BaseRepository
    {
        $queryParamTrim = trim($queryParam);
        return (new DepartmentsRepository())->filterDepartments($queryParamTrim);
    }
}
