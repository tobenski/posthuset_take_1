<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MenuType extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'menu_types';

    protected $fillable = [
        'name',
        'time',
    ];

    public function menucards()
    {
        return $this->hasMany(Menucard::class);
    }
}
