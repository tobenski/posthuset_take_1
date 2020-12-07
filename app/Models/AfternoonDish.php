<?php

namespace App\Models;

use Flyhjaelp\LaravelEloquentOrderable\Interfaces\OrderableInterface;
use Flyhjaelp\LaravelEloquentOrderable\Traits\OrderableWithinGroup;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Collection;

class AfternoonDish extends Model implements OrderableInterface
{
    use HasFactory;
    use SoftDeletes;
    use OrderableWithinGroup;

    protected $table = 'afternoon_dishes';

    protected $fillable = [
        'name',
        'content',
        'price',
        'order',
    ];

    public function scopeOrdered(Builder $query) : void
    {
        $query->orderBy('eftermiddags_menu_id')->orderBy('order');
    }

    public function scopeWithinOrderGroup(Builder $query, OrderableInterface $orderableModel) : void
    {
        $query->where('eftermiddags_menu_id', $orderableModel->frokost_menu_id);
    }

    public function columnsAffectingOrderGroup(): Collection
    {
        return collect(['eftermiddags_menu_id']);
    }

    public function eftermiddagsMenuer()
    {
        return $this->belongsToMany(EftermiddagsMenu::class);
    }
}
