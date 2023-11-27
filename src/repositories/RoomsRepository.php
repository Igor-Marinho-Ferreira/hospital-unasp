<?php

namespace src\repositories;

use src\database\models\Rooms;

class RoomsRepository extends BaseRepository
{
    function __construct(Rooms $rooms = null)
    {
        $this->setModel($rooms ?? (new Rooms));
    }
}
