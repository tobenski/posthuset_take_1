<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class AnbefalerMenu extends Model implements HasMedia
{
    use HasFactory;
    use SoftDeletes;
    use InteractsWithMedia;

    protected $table = 'anbefaler_menus';

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

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('menu')
            ->useDisk('s3')
            ->singleFile()
            ->withResponsiveImages();
    }

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
        return $this->hasMany(AnbefalerDish::class);
    }
}
