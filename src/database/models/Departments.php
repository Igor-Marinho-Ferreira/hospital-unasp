<?php

namespace src\database\models;

use src\database\Model;

class Departments extends Model
{
    //Properties Query Builder
    public $table = 'departments';
    public $db = DATABASE_DEFAULT;

    //Properties database
    public int $id;
    public string $name;
    public string $description;
    public string $status;


    public string $created_at;
    public string $updated_at;
    public ?string $deleted_at;
    
    
    //Relations
    public $relations = [];    
}
