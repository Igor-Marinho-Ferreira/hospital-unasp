<?php

namespace src\database\models;

use src\database\Model;

class Rooms extends Model
{
    //Properties Query Builder
    public $table = 'rooms';
    public $db = DATABASE_DEFAULT;

    //Properties database
    public int $id;
    public string $code;
    public string $description;
    public string $status;


    public string $created_at;
    public string $updated_at;
    public ?string $deleted_at;
    
    
    //Relations
    public $relations = [];    
}
