<?php

namespace src\requests\administrative;

use src\requests\BaseRequest;

class ResetRequest extends BaseRequest
{
    protected $rules = [
        "user_key" => "required",
        "email" => "required"
    ];

    public function __construct()
    {
        return $this->execute();
    }
}
