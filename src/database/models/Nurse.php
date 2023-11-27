<?php

namespace src\database\models;

use src\database\Model;

class Nurse extends Model
{
    //Properties Query Builder
    public $table = 'nurses';
    public $db = DATABASE_DEFAULT;

    //Properties database
    public int $id;
    public string $name;
    public string $lastname;
    public string $email;
    public string $password;
    public string $crm;
    public string $department_id;
    public string $telephone;
    public string $status;


    public string $created_at;
    public string $updated_at;
    public ?string $deleted_at;
    
    
    //Relations
    public $relations = [];    
}
