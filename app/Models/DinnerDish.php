<?php

namespace App\Models;

use Flyhjaelp\LaravelEloquentOrderable\Interfaces\OrderableInterface;
use Flyhjaelp\LaravelEloquentOrderable\Traits\OrderableWithinGroup;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Collection;

class DinnerDish extends Model implements OrderableInterface
{
    use HasFactory;
    use SoftDeletes;
    use OrderableWithinGroup;

    protected $table = 'dinner_dishes';

    protected $fillable = [
        'name',
        'content',
        'price',
        'order',
        'menu_type_id',
    ];

    public function scopeOrdered(Builder $query) : void
    {
        $query->orderBy('frokost_menu_id')->orderBy('order');
    }

    public function scopeWithinOrderGroup(Builder $query, OrderableInterface $orderableModel) : void
    {
        $query->where('frokost_menu_id', $orderableModel->frokost_menu_id);
    }

    public function columnsAffectingOrderGroup(): Collection
    {
        return collect(['frokost_menu_id']);
    }

    public function menuType()
    {
        $this->belongsTo(MenuType::class);
    }

    public function AftenMenuer()
    {
        return $this->belongsToMany(AftenMenu::class);
    }
}
