<?php

namespace src\database\models;

use src\database\Model;

class Patient extends Model
{
    //Properties Query Builder
    public $table = 'patients';
    public $db = DATABASE_DEFAULT;

    //Properties database
    public int $id;
    public string $name;
    public string $lastname;
    public string $password;
    public string $email;
    public string $cpf;
    public string $dath_birth;
    public string $telephone;
    public string $cep;
    public string $street;
    public string $number_home;
    public string $city;
    public string $state;
    public string $status;


    public string $created_at;
    public string $updated_at;
    public ?string $deleted_at;
    
    
    //Relations
    public $relations = [];    
}
