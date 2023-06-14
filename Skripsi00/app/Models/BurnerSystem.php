<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BurnerSystem extends Model
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
        'unit',
        'tanggal_update',
        'jam_update',
        'status_burner1',
        'status_burner2',
        'status_burner3',
        'status_burner4',
        'ket_burner1',
        'ket_burner2',
        'ket_burner3',
        'ket_burner4',
        'status_equipment_id',
        'catatan',
    ];

    protected $dates = ['deleted_at'];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function forwarding()
    {
        return $this->belongsTo(forwarding::class, 'forwarding_id', 'id');
    }

    public function status_equipments()
    {
        return $this->belongsTo(StatusEquipment::class, 'status_equipment_id','id');
    }
}
