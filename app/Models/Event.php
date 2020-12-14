<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Event extends Model implements HasMedia
{
    use HasFactory;
    use SoftDeletes;
    use HasSlug;
    use InteractsWithMedia;



    protected $table = 'events';

    protected $fillable = [
        'slug',
        'name',
        'date',
        'time',
        'duration',
        'content',
        'content2',
        'price',
        'button_text',
        'button_link',
        'online',
        'image',
    ];

    protected $dates = [
        'date',
        'time',
    ];

    protected $casts = [
        'online' => 'boolean',
    ];

    public function getDateString()
    {
        return Carbon::parse($this->attributes['date'])->toDateString();
    }

    public function getTimeString()
    {
        return Carbon::parse($this->attributes['time'])->toTimeString();
    }

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
                ->generateSlugsFrom('name')
                ->saveSlugsTo('slug')
                ->doNotGenerateSlugsOnUpdate();
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('event')
            ->useDisk('s3')
            ->singleFile()
            ->withResponsiveImages();
    }
}
