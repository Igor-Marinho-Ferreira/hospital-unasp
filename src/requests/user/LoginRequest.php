<?php

namespace src\requests\user;

use src\requests\BaseRequest;

class LoginRequest extends BaseRequest
{
    protected $rules = [
        "user_key" => "required",
        "password" => "required"
    ];

    public function __construct()
    {
        return $this->execute();
    }
}
