<?php

namespace src\database\models;

use src\database\Model;

class Reset extends Model
{
    //Properties Query Builder
    public $table = 'reset_password';
    public $db = DATABASE_DEFAULT;

    //Properties database
    public int $id;
    public string $hash_reset;
    public string $user_key;
    public string $user_email;
    public string $expired_at;

    public string $created_at;
    public string $updated_at;
    public ?string $deleted_at;
    
    
    //Relations
    public $relations = [];    
}
