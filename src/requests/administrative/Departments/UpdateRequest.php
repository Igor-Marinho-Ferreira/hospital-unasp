<?php
namespace src\requests\administrative\Departments;

use src\requests\BaseRequest;

class UpdateRequest extends BaseRequest
{
    protected $rules = [
        "id" => "required",
        "name" => "required",
        "description" => "required",
        "status" => "required"
    ];

    public function __construct()
    {
        return $this->execute();
    }
}
