<?php
namespace src\requests\medical\Enchiridion;

use src\requests\BaseRequest;

class StoreRequest extends BaseRequest
{
    protected $rules = [
        "id_patient" => "required",
        "id_nurse" => "required",
        "id_doctor" => "required",
        "open_date" => "required",
        "comments" => "required"
    ];

    public function __construct()
    {
        return $this->execute();
    }
}
