<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profile extends Model
{
    use HasFactory;
    use Uuids;
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'no_hp',
        'profile_img',
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id','id');
    }
}
