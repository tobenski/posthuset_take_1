<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menucard extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'menucards';

    protected $fillable = [
        'first_day',
        'last_day',
        'online',
        'content',
        'menu_type_id',
    ];

    protected $dates = [
        'first_day',
        'last_day',
    ];

    protected $casts = [
        'online' => 'boolean',
    ];


    public function menuType()
    {
        return $this->belongsTo(MenuType::class);
    }
}
