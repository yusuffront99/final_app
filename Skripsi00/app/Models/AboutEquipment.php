<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutEquipment extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_equipment',
        'position',
        'description',
        'specification',
        'img_equipment',
    ];
}
