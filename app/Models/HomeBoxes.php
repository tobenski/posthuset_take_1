<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HomeBoxes extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'home_boxes';

    protected $fillable = [
        'title',
        'content',
        'button',
        'link',
        'online',
    ];

    protected $casts = [
        'online' => 'boolean',
    ];
}
