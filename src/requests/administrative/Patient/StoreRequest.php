<?php
namespace src\requests\administrative\Patient;

use src\requests\BaseRequest;

class StoreRequest extends BaseRequest
{
    protected $rules = [
        "name" => "required",
        "lastname" => "required",
        "email" => "required",
        "cpf" => "required",
        "dath_birth" => "required",
        "telephone" => "required",
        "cep" => "required",
        "street" => "required",
        "number_home" => "required",
        "city" => "required",
        "state" => "required",
        "status" => "required"
    ];

    public function __construct()
    {
        return $this->execute();
    }
}
