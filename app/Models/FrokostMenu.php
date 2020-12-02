<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FrokostMenu extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'frokost_menus';

    protected $fillable =[
        'firstday',
        'lastday',
        'timeframe',
        'comment',
        'online',
        'image',
    ];

    protected $casts = [
        'online' => 'boolean',
    ];

    protected $dates = [
        'firstday',
        'lastday',
    ];

    public function retter()
    {
        return $this->morphMany(Ret::class, 'retable');
    }
}
