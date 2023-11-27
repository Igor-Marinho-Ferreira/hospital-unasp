<?php

namespace src\database\models;

use src\database\Model;

class Medical extends Model
{
    //Properties Query Builder
    public $table = 'doctors';
    public $db = DATABASE_DEFAULT;

    //Properties database
    public int $id;
    public string $name;
    public string $lastname;
    public string $password;
    public string $email;
    public string $department_id;
    public string $specialty;
    public string $telephone;
    public string $status;


    public string $created_at;
    public string $updated_at;
    public ?string $deleted_at;
    
    
    //Relations
    public $relations = [];    
}
