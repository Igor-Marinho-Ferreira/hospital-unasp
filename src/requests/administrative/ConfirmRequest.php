<?php

namespace src\requests\administrative;

use src\requests\BaseRequest;

class ConfirmRequest extends BaseRequest
{
    protected $rules = [
        "password" => "required",
        "password_verify" => "required"
    ];

    public function __construct()
    {
        return $this->execute();
    }
}
