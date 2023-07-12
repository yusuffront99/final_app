<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Maintenance extends Model
{
    use HasFactory;
    use Uuids;
    use SoftDeletes;

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function burner_systems()
    {
        return $this->belongsTo(BurnerSystem::class, 'burner_system_id', 'id');
    }

    public function status_equipment()
    {
        return $this->belongsTo(StatusEquipment::class, 'status_equipment_id', 'id');
    }
}
