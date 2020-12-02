<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ret extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'rets';

    protected $fillable = [
        'name',
        'content',
        'price',
    ];

    public function retable()
    {
        return $this->morphTo();
    }

    public function frokostMenuer() //poly
    {
        return $this->belongsToMany(FrokostMenu::class);
    }
}
