<?php

namespace src\database\models;

use src\database\Model;

class Appointment extends Model
{
    //Properties Query Builder
    public $table = 'appointment';
    public $db = DATABASE_DEFAULT;

    //Properties database
    public int $id;
    public string $name;
    public string $cpf;
    public string $dath_birth;
    public string $telephone;
    public string $id_doctor;
    public string $id_patient;
    public string $appointment;
    public string $hour;
    public string $status;


    public string $created_at;
    public string $updated_at;
    public ?string $deleted_at;
    
    
    //Relations
    public $relations = [];    
}
