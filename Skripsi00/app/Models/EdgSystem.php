<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EdgSystem extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Uuids;

    protected $fillable = [
        'nip',
        'user_id',
        'operator_kedua',
        'operator_shift',
        'atasan',
        'tanggal_update',
        'lev_bbm_awal',
        'lev_oli',
        'teg_battery',
        'jam_start',
        'teg_out',
        'frekuensi',
        'putaran',
        'temp_coolant',
        'press_oli',
        'jam_stop',
        'lev_bbm_akhir',
        'status_equipment_id',
        'catatan',
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function status_equipments()
    {
        return $this->belongsTo(StatusEquipment::class, 'status_equipment_id','id');
    }


}
