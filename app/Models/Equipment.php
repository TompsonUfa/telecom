<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    use HasFactory;

    protected $fillable = [
        "equipment_type_id",
        "serial_number",
        "desc"
    ];

    public function type()
    {
        return $this->hasOne(EquipmentType::class, 'equipment_type_id', 'id');
    }
}
