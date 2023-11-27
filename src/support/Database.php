<?php

namespace src\support;

class Database
{
    /**
     * Obtains the values of the inclusion file
     * 
     * @param string $typeConnection
     * @return array 
     */
    function getFromSettings(string $typeConnection): array
    {
        return require("/var/www/html/projects/includes/return/{$typeConnection}.php");
    }
}
