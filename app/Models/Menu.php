<?php

namespace App\Models;

use App\Traits\SelfReferenceTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    use SelfReferenceTrait;

    protected $table = 'menus';

    protected $fillable = [
        'text',
        'url',
        'order',
    ];



}
