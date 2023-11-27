<?php
namespace src\requests\administrative\Nurse;

use src\requests\BaseRequest;

class UpdateRequest extends BaseRequest
{
    protected $rules = [
        "id" => "required",
        "name" => "required",
        "lastname" => "required",
        "email" => "required",
        "crm" => "required",
        "department_id" => "required",
        "telephone" => "required",
        "status" => "required"
    ];

    public function __construct()
    {
        return $this->execute();
    }
}
