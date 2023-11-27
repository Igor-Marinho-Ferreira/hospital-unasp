<?php

namespace src\services;

use DateTime;
use src\database\models\Patient;
use src\repositories\BaseRepository;
use src\repositories\PatientRepository;
use src\support\Mailer;

class PatientService
{
    /**
     * Responsible for seeking all users
     * @return ?BaseRepository
     */
    public function all(): ?BaseRepository
    {
        return (new PatientRepository())->allWithPaginate();
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
        $password = (bin2hex(random_bytes(4)));
        $saved = (new PatientRepository(
            (new Patient)->fill(array_merge(
                ["password" => password_hash($password, PASSWORD_DEFAULT)],
                $data))
        ))->save();
        if(!$saved)
            return false;
        
        return (new Mailer(fromName: "UNASP - Portal"))
            ->setAddressees([$data["email"]])
            ->setSubject("UNASP - Credenciais de acesso")
            ->setBody(
                str_replace(
                    [
                        "{{link}}",
                        "{{login}}",
                        "{{password}}"
                    ],
                    [
                        route(AUTH . AUTH_LOGIN_PATIENT),
                        $data["name"],
                        $password
                    ],
                    file_get_contents(base_url() . "/public/emails/credentialsPatient.html")
                )
            )
            ->fire();
    }

    /**
     * Check if there is any user registered with the registration provided and later validated the password, if it is ok, will create the "authentication" session.
     * 
     * @param array $dataFromForm
     * @return ?array
     */
    function authenticate(array $dataFromForm): ?array
    {
        ["user_key" => $user_key, "password" => $password] = $dataFromForm;
        $patient = (new PatientRepository())->getByDocument($user_key);
        if (!$patient or $patient->deleted_at)
            return null;
        // dd($password, $patient->password);
        return password_verify($password, $patient->password) ?
            setSession(
                AUTHENTICATION_SESS,
                array_only((array) $patient, [
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
     * Responsible for obtaining an employee according to registration
     * @param string $userKey
     * @return ?object
     */
    function getByUserKey(string $userKey): ?object
    {
        return (new PatientRepository())->getByUserKey($userKey);
    }

    /**
    * Responsible for updating user data
    * @param array $dataFromForm
    * @return ?bool
    */
    function update(array $dataFromForm): ?bool
    {
        $dataFromForm['status'] === 'Y' ? $dataFromForm['deleted_at'] = null :  $dataFromForm['deleted_at'] = (new DateTime())->format("Y-m-d H:i:s"); 
        return (new PatientRepository(
            (new Patient)->fill($dataFromForm)
        ))->save();
    }

    /**
     * Responsible for updating status from user
     * @param string $status
     * @return ?bool
     */
    function updateStatus(int $id, ?string $status): ?bool
    {
        return (new PatientRepository(
            (new Patient)->fill([
                "id" => $id,
                "deleted_at" => $status
            ])
        ))->save();
    }

    function destroy($id)
    {
        if ((new PatientRepository(
            (new Patient)->fill([
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
        return (new PatientRepository)->getLastInsertedId();
    }

    /**
     * Responsible for seeking users by ID
     * @param int $id
     * @return ?object
     */
    function findById(int $id): ?object
    {
        return (new PatientRepository())->byId($id)?->results;
    }

    /**
     * Responsible for seeking all users using filter
     * @param string $queryParam
     * @return ?BaseRepository
     */
    public function filter(string $queryParam): ?BaseRepository
    {
        $queryParamTrim = trim($queryParam);
        return (new PatientRepository())->filterPatient($queryParamTrim);
    }

    /**
    * Responsible for seeking all registered groups
    * @return ?array
    */
    function allOptions()
    {
        return (new PatientRepository())->all()?->results;
    }
}
