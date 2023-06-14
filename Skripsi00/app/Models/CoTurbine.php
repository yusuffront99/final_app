<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CoTurbine extends Model
{
    use HasFactory;
    use Uuids;
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'operator_shift',
        'unit',
        'nama_peralatan',
        'tanggal_update',
        'jam_update',
        'operasi_awal',
        'rencana_operasi',
        'operasi_akhir',
        'status_kegiatan',
        'status_peralatan',
        'status_equipment_id',
        'catatan'
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id','id');
    }

    public function status_equipments()
    {
        return $this->belongsTo(StatusEquipment::class, 'status_equipment_id','id');
    }
}
