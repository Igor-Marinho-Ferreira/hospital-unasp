<?php
namespace src\requests\administrative\Rooms;

use src\requests\BaseRequest;

class UpdateRequest extends BaseRequest
{
    protected $rules = [
        "id" => "required",
        "code" => "required",
        "description" => "required",
        "status" => "required"
    ];

    public function __construct()
    {
        return $this->execute();
    }
}
