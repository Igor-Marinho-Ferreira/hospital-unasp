<?php
namespace src\requests\administrative\Rooms;

use src\requests\BaseRequest;

class StoreRequest extends BaseRequest
{
    protected $rules = [
        "code" => "required",
        "description" => "required",
        "status" => "required"
    ];

    public function __construct()
    {
        return $this->execute();
    }
}
