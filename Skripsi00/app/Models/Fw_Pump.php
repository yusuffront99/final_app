<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fw_Pump extends Model
{
    use HasFactory;
    use Uuids;
    use SoftDeletes;

    protected $guarded = [];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function status_equipments()
    {
        return $this->belongsTo(StatusEquipment::class, 'status_equipment_id','id');
    }
}
