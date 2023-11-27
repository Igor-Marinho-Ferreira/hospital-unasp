<?php

namespace src\database\models;

use src\database\Model;

class Enchiridion extends Model
{
    //Properties Query Builder
    public $table = 'enchiridions';
    public $db = DATABASE_DEFAULT;

    //Properties database
    public int $id;
    public string $id_patient;
    public string $id_nurse;
    public string $id_doctor;
    public string $comments;
    public string $open_date;


    public string $created_at;
    public string $updated_at;
    public ?string $deleted_at;
    
    
    //Relations
    public $relations = [];    
}
