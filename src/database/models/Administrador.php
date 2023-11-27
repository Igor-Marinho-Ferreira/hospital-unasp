<?php

namespace src\database\models;

use src\database\Model;

class Administrador extends Model
{
    //Properties Query Builder
    public $table = 'admin';
    public $db = DATABASE_DEFAULT;

    //Properties database
    public int $id;
    public string $name;
    public string $email;
    public string $user_key;
    public string $password;

    public string $created_at;
    public string $updated_at;
    public ?string $deleted_at;
    
    
    //Relations
    public $relations = [];    
}
