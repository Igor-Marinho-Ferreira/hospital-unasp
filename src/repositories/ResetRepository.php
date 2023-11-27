<?php

namespace src\repositories;

use src\database\models\Reset;

class ResetRepository extends BaseRepository
{
    function __construct(Reset $reset = null)
    {
        $this->setModel($reset ?? (new Reset));
    }

    /**
     * Get the record by hash and registration
     * @param string $hash encrypted code
     * @param string $userKey User Registration
     * @return ?object
     */
    function getByUserKeyHash(string $hash, string $userKey): ?object
    {
        return $this
            ->select(['*'])
            ->where(
                column: "user_key",
                operator: "=",
                value: "'{$userKey}'",
                logic: "AND"
            )
            ->where(
                column: "hash_reset",
                operator: "=",
                value: "'{$hash}'",
                logic: "AND"
            )
            ->where(
                column: "deleted_at",
                operator: "IS",
                value: "NULL",
            )
            ->done()
            ?->results;
    }

        /**
     * Check if the user has any reset record, if yes, will bring the ID.
     * 
     * @param Employee $employee
     * @return ?int
     */
    function getIdLastReset(string $userKey, string $hashReset): ?int
    {
        return $this->select(['id'])
            ->where(
                column: "user_key",
                operator: "=",
                value: "'{$userKey}'",
                logic: "AND"
            )
            ->where(
                column: "hash_reset",
                operator: "<>",
                value: "'{$hashReset}'",
                logic: "AND"
            )
            ->where(
                column: "deleted_at",
                operator: "IS",
                value: "NULL",
            )
            ->done()?->results?->id;
    }
    
    /**
     * Responsible for obtaining the active reset ID for the user
     * @param string $userKey User Registration
     * @return ?int Registration ID found or null
     */
    function getIdActive2User(string $userKey): ?int
    {
        return $this->select(["*"])
            ->where("user_key", "=", "'{$userKey}'", "AND")
            ->where("deleted_at", "IS", "NULL")
            ->done(onlyOne: true)
            ->get()
            ?->id;
    }
}
