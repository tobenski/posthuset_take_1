<?php

namespace App\Models;

use Carbon\Carbon;
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
        'order',
    ];

    protected $casts = [
        'online' => 'boolean',
    ];

    protected $dates = [
        'firstday',
        'lastday',
    ];

    public function getFirstdayAttribute()
    {
        return Carbon::parse($this->attributes['firstday'])->toDateString();
    }

    public function getLastdayAttribute()
    {
        return Carbon::parse($this->attributes['lastday'])->toDateString();
    }

    public function retter()
    {
        return $this->hasMany(LunchDish::class);
    }
}
