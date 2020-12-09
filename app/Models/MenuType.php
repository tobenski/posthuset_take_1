<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MenuType extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function retter()
    {
        $this->hasMany(DinnerDish::class);
    }
}
