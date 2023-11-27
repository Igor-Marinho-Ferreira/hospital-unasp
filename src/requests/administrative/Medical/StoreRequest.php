<?php
namespace src\requests\administrative\Medical;

use src\requests\BaseRequest;

class StoreRequest extends BaseRequest
{
    protected $rules = [
        "name" => "required",
        "lastname" => "required",
        "email" => "required",
        "departments_id" => "required",
        "specialty" => "required",
        "telephone" => "required",
        "status" => "required"
    ];

    public function __construct()
    {
        return $this->execute();
    }
}
