<?php
namespace src\requests\user\Appointment;

use src\requests\BaseRequest;

class StoreRequest extends BaseRequest
{
    protected $rules = [
        "name" => "required",
        "cpf" => "required",
        "dath_birth" => "required",
        "telephone" => "required",
        "id_doctor" => "required",
        "id_patient" => "required",
        "appointment" => "required",
        "hour" => "required",
        "status" => "required"
    ];

    public function __construct()
    {
        return $this->execute();
    }
}
