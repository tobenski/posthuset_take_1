<?php

namespace App\Models;

use Flyhjaelp\LaravelEloquentOrderable\Interfaces\OrderableInterface;
use Flyhjaelp\LaravelEloquentOrderable\Traits\OrderableWithinGroup;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Collection;

class ChildrensDish extends Model implements OrderableInterface
{
    use HasFactory;
    use SoftDeletes;
    use OrderableWithinGroup;

    protected $table = 'childrens_dishes';

    protected $fillable = [
        'name',
        'content',
        'price',
        'order',
    ];

    public function scopeOrdered(Builder $query) : void
    {
        $query->orderBy('borne_menu_id')->orderBy('order');
    }

    public function scopeWithinOrderGroup(Builder $query, OrderableInterface $orderableModel) : void
    {
        $query->where('borne_menu_id', $orderableModel->borne_menu_id);
    }

    public function columnsAffectingOrderGroup(): Collection
    {
        return collect(['borne_menu_id']);
    }

    public function BorneMenuer()
    {
        return $this->belongsToMany(BorneMenu::class);
    }
}
