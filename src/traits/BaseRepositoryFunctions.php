<?php

namespace src\traits;

use src\core\Request;

trait BaseRepositoryFunctions
{


    /**
     * Method responsible for seeking all records in the database
     * 
     * @return object|null
     */
    public function all(): object|null
    {
        return $this->select(["*"])->done(onlyOne: false);
    }

    /**
     * This method aims to seek all records of the table configured through the model
     * 
     * @return object|null
     */
    public function allWithPaginate(): object|null
    {
        return $this->select(["*"])->done(onlyOne: false, paginate: (object) [PERPAGE => 4, PAGE => Request::query("page") ?? 1]) ?? null;
    }

    /**
     * This method's responsible for find by column id
     * 
     * @param int $id  Registration ID that is to seek
     * @return object|null
     */
    public function byId(int $id)
    {
        return $this->select(['*'])->where(column: "id", operator: "=", value: $id)->done(onlyOne: true);
    }

    /**
     * This method's responsible for find by column
     * 
     * @param string $column Column that will be used in comparative condition
     * @param string $operator Operator that will be used in comparative condition
     * @param mixed $value Value that will be used in comparative condition
     * @param bool $onlyOne Whether the result should be just a record or not
     * @param bool $paginate Whether the result will be paginated or not
     * @return object|null
     */
    public function byColumn(string $column, string $operator, mixed $value, bool $onlyone = true, bool $paginate = false)
    {
        if (!$paginate)
            return $this->select(['*'])->where(column: $column, operator: $operator, value: $value)->done(onlyOne: $onlyone);

        return $this->select(['*'])->where($column, $operator, $value)->done(onlyOne: false, paginate: (object) [PERPAGE => 4, PAGE => Request::query("page") ?? 1]);
    }

    /**
     * Responsible for searching for the page page and filtered according to the parameter.
     * 
     * @return object|null
     */
    public function filterDepartments(string $queryParam): object|null
    {

        return $this
            ->select(["*"])
            ->where("name", "LIKE", "'%{$queryParam}%'", "OR")
            ->where("description", "LIKE", "'%{$queryParam}%'")
            ->done(onlyOne: false, paginate: (object) [PERPAGE => 4, PAGE => Request::query("page") ?? 1]) ?? null;
    }

    /**
     * Responsible for searching for the page page and filtered according to the parameter.
     * 
     * @return object|null
     */
    public function filterAppointments(string $queryParam): object|null
    {

        return $this
            ->select(["*"])
            ->where("name", "LIKE", "'%{$queryParam}%'")
            ->done(onlyOne: false, paginate: (object) [PERPAGE => 4, PAGE => Request::query("page") ?? 1]) ?? null;
    }

    /**
     * Responsible for searching for the page page and filtered according to the parameter.
     * 
     * @return object|null
     */
    public function filterRooms(string $queryParam): object|null
    {

        return $this
            ->select(["*"])
            ->where("code", "LIKE", "'%{$queryParam}%'", "OR")
            ->where("description", "LIKE", "'%{$queryParam}%'")
            ->done(onlyOne: false, paginate: (object) [PERPAGE => 4, PAGE => Request::query("page") ?? 1]) ?? null;
    }

    /**
     * Responsible for searching for the page page and filtered according to the parameter.
     * 
     * @return object|null
     */
    public function filterMedical(string $queryParam): object|null
    {

        return $this
            ->select(["*"])
            ->where("name", "LIKE", "'%{$queryParam}%'", "OR")
            ->where("departments_id", "LIKE", "'%{$queryParam}%'", "OR")
            ->where("specialty", "LIKE", "'%{$queryParam}%'", "OR")
            ->where("telephone", "LIKE", "'%{$queryParam}%'")
            ->done(onlyOne: false, paginate: (object) [PERPAGE => 4, PAGE => Request::query("page") ?? 1]) ?? null;
    }

    /**
     * Responsible for searching for the page page and filtered according to the parameter.
     * 
     * @return object|null
     */
    public function filterPatient(string $queryParam): object|null
    {

        return $this
            ->select(["*"])
            ->where("name", "LIKE", "'%{$queryParam}%'", "OR")
            ->where("cpf", "LIKE", "'%{$queryParam}%'", "OR")
            ->where("dath_birth", "LIKE", "'%{$queryParam}%'", "OR")
            ->where("telephone", "LIKE", "'%{$queryParam}%'", "OR")
            ->where("cep", "LIKE", "'%{$queryParam}%'", "OR")
            ->where("street", "LIKE", "'%{$queryParam}%'", "OR")
            ->where("number_home", "LIKE", "'%{$queryParam}%'", "OR")
            ->where("city", "LIKE", "'%{$queryParam}%'", "OR")
            ->where("state", "LIKE", "'%{$queryParam}%'")
            ->done(onlyOne: false, paginate: (object) [PERPAGE => 4, PAGE => Request::query("page") ?? 1]) ?? null;
    }

    /**
     * Responsible for searching for the page page and filtered according to the parameter.
     * 
     * @return object|null
     */
    public function filterEnchiridion(string $queryParam): object|null
    {

        return $this
            ->select(["*"])
            ->where("id_patient", "LIKE", "'%{$queryParam}%'", "OR")
            ->where("id_nurse", "LIKE", "'%{$queryParam}%'", "OR")
            ->where("id_doctor", "LIKE", "'%{$queryParam}%'", "OR")
            ->where("comments", "LIKE", "'%{$queryParam}%'", "OR")
            ->where("open_date", "LIKE", "'%{$queryParam}%'")
            ->done(onlyOne: false, paginate: (object) [PERPAGE => 4, PAGE => Request::query("page") ?? 1]) ?? null;
    }

    /**
     * Responsible for searching for the page page and filtered according to the parameter.
     * 
     * @return object|null
     */
    public function filterNurse(string $queryParam): object|null
    {

        return $this
            ->select(["*"])
            ->where("name", "LIKE", "'%{$queryParam}%'", "OR")
            ->where("crm", "LIKE", "'%{$queryParam}%'", "OR")
            ->where("department_id", "LIKE", "'%{$queryParam}%'", "OR")
            ->where("telephone", "LIKE", "'%{$queryParam}%'")
            ->done(onlyOne: false, paginate: (object) [PERPAGE => 4, PAGE => Request::query("page") ?? 1]) ?? null;
    }
}
