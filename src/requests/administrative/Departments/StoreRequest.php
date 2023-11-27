<?php
namespace src\requests\administrative\Departments;

use src\requests\BaseRequest;

class StoreRequest extends BaseRequest
{
    protected $rules = [
        "name" => "required",
        "description" => "required",
        "status" => "required"
    ];

    public function __construct()
    {
        return $this->execute();
    }
}
