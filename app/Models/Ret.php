<?php

namespace App\Models;

use Flyhjaelp\LaravelEloquentOrderable\Interfaces\OrderableInterface;
use Flyhjaelp\LaravelEloquentOrderable\Traits\OrderableWithinGroup;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Collection;

class Ret extends Model implements OrderableInterface
{
    use HasFactory;
    use SoftDeletes;
    use OrderableWithinGroup;

    protected $table = 'rets';

    protected $fillable = [
        'name',
        'content',
        'price',
    ];

    public function scopeOrdered(Builder $query) : void
    {
        $query->orderBy('retable_type')
              ->orderBy('retable_id')
              ->orderBy('order');
    }

    public function scopeWithinOrderGroup(Builder $query, OrderableInterface $orderableModel) : void
    {
        $query->where('retabale_type', $orderableModel->retable_type)
              ->where('retable_id', $orderableModel->retable_id);
    }

    public function columnsAffectingOrderGroup() : Collection
    {
        return collect(['retable_id']);
    }

    public function retable()
    {
        return $this->morphTo();
    }

    public function frokostMenuer() //poly
    {
        return $this->belongsToMany(FrokostMenu::class);
    }
}
