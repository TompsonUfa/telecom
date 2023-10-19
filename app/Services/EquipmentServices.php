<?php

namespace App\Services;

use App\Models\Equipment;

class EquipmentServices
{
    public function index($search)
    {

        if(isset($search)){
            Equipment::where();
        }

        return Equipment::paginate(10);
    }
}
