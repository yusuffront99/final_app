<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Leader extends Model
{
    use HasFactory;
    use Uuids;

    protected $fillable = [
        'nip',
        'nama_lengkap',
        'jabatan'
    ];

}
