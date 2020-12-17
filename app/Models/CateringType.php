<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CateringType extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'catering_types';

    protected $fillable =[
        'name',
    ];

    public function CateringMenus()
    {
        return $this->hasMany(CateringMenu::class);
    }
}
