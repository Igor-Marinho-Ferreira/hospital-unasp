<?php

namespace src\services;

use DateTime;
use src\database\models\Administrador;
use src\database\models\Patient;
use src\database\models\Reset;
use src\repositories\ResetRepository;

class ResetService
{

    /**
     * Responsible for adding a record in the "reset_password" table
     * @param string $userKey
     * @param string $userEmail
     * 
     * @return ?array Content for the session "resetSession"
     */
    function save(string $userKey, string $userEmail): ?array
    {
        $contentClass = [
            "hash_reset" => bin2hex(random_bytes(20)),
            "user_key" => $userKey,
            "user_email" => $userEmail,
            "expired_at" => (new DateTime("now"))->modify("+3 hours")->format("Y-m-d H:i:s")
        ];

        return (new ResetRepository((new Reset)->fill($contentClass)))->save() ? $contentClass : null;
    }

    /**
     * Get the record by hash and registration
     * @param string $hash encrypted code
     * @param string $userKey User Registration
     * @return object
     */
    function getByUserKeyHash(string $hash, string $userKey)
    {
        return (new ResetRepository())
            ->getByUserKeyHash($hash, $userKey);
    }

    /**
     * Responsible for obtaining from the file the content that will be sent in the password recovery email
     * @return string
     */
    function getResetEmail(string $route = AUTH . AUTH_RESET_ADMINISTRATIVE_CONFIRM): string
    {
        $resetSession = getSession("resetSession");
        $path = base_url() . "/public/emails/reset.html";

        return str_replace(
            [
                "{{hash}}",
                "{{userKey}}",
                "{{link}}"
            ],
            [
                $resetSession["hash_reset"],
                $resetSession["user_key"],
                route($route . "?hash={$resetSession["hash_reset"]}&userKey={$resetSession["user_key"]}")
            ],
            file_get_contents($path)
        );
    }

    /**
     * Check if the user has any reset record, if yes, will bring the ID.
     * 
     * @param Administrador|Patient $entity
     * @return ?int
     */
    function getIdLastReset(Administrador|Patient $entity, string $hashReset): ?int
    {
        $userKey = ($entity instanceof Administrador) ? $entity->user_key : $entity->name;
        return (new ResetRepository())->getIdLastReset($userKey, $hashReset);
    }

    /**
     * Updates the record to make it invalid
     * @param int $id
     * @return bool Updated the registration or not
     */
    function invalidateReset(int $id): bool
    {
        $datetime = (new DateTime("now"))->format("Y-m-d H:i:s");

        return (new ResetRepository(
            (new Reset)
                ->fill([
                    "id" => $id,
                    "deleted_at" => $datetime
                ])
        ))->save();
    }

        /**
     * Responsible for updating the column "deleted_at"
     * @param string $userKey User Registration
     * 
     * @return bool
     */
    function disableActive(string $userKey): bool
    {
        $id = $this->getIdActive2User($userKey);
        if (empty($id)) return false;

        return (new ResetRepository(
            (new Reset)->fill(
                [
                    "id" => $this->getIdActive2User($userKey),
                    "deleted_at" => (new DateTime("now"))->format("Y-m-d H:i:s")
                ]
            )
        )
        )->save();
    }

    /**
     * Responsible for obtaining the active reset ID for the user
     * @param string $userKey User Registration
     * @return ?int Registration ID found or null
     */
    function getIdActive2User(string $userKey): ?int
    {
        return (new ResetRepository)->getIdActive2User($userKey);
    }

}
