<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class AftenMenu extends Model implements HasMedia
{
    use HasFactory;
    use SoftDeletes;
    use InteractsWithMedia;

    protected $table = 'aften_menus';

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
        return $this->hasMany(DinnerDish::class);
    }

    public function forretter()
    {
        return $this->retter()->where('menu_type_id', 1);
    }

    public function mellemretter()
    {
        return $this->retter()->where('menu_type_id', 2);
    }

    public function hovedretter()
    {
        return $this->retter()->where('menu_type_id', 3);
    }

    public function osteretter()
    {
        return $this->retter()->where('menu_type_id', 4);
    }

    public function desserter()
    {
        return $this->retter()->where('menu_type_id', 5);
    }

    public function osteDesserter()
    {
        return $this->retter()->where('menu_type_id','>=', 4);
    }

    public function hasOsteret()
    {
        return count($this->retter()->where('menu_type_id', 4)) > 0 ? true : false;
    }
}
