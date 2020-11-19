<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Flyhjaelp\LaravelEloquentOrderable\Interfaces\OrderableInterface;
use Flyhjaelp\LaravelEloquentOrderable\Traits\Orderable;

class Slide extends Model implements OrderableInterface
{
    use HasFactory;
    use SoftDeletes;
    use Orderable;

    protected $fillable = [
        'title',
        'content',
        'page',
        'duration',
        'online',
        'order',
    ];
}
