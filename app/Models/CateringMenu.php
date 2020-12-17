<?php

namespace App\Models;

use Flyhjaelp\LaravelEloquentOrderable\Interfaces\OrderableInterface;
use Flyhjaelp\LaravelEloquentOrderable\Traits\Orderable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class CateringMenu extends Model implements HasMedia, OrderableInterface
{
    use HasFactory;
    use HasSlug;
    use SoftDeletes;
    use InteractsWithMedia;
    use Orderable;

    protected $table = 'catering_menus';

    protected $fillable = [
        'title',
        'slug',
        'description',
        'menu',
        'price',
        'min_couv',
        'order',
        'catering_type_id',
        'online',
    ];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
                ->generateSlugsFrom('title')
                ->saveSlugsTo('slug')
                ->doNotGenerateSlugsOnUpdate();
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('catering')
            ->useDisk('s3')
            ->singleFile()
            ->withResponsiveImages();
    }

    public function cateringType()
    {
        return $this->belongsTo(CateringType::class);
    }
}
