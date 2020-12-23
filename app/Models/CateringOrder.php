<?php

namespace App\Models;

use App\Traits\UsesUuid;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CateringOrder extends Model
{
    use HasFactory;
    use SoftDeletes;
    use UsesUuid;

    protected $table = 'catering_orders';

    protected $fillable = [
        'date',
        'time',
        'count',
        'delivery',
        'delivery_addresss',
        'delivery_zip',
        'contact_phone',
        'user_id',
        'catering_menu_id',
    ];

    protected $dates = [
        'date',
        'time',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function cateringMenu()
    {
        return $this->belongsTo(CateringMenu::class);
    }

    public function getDateAttribute()
    {
        return Carbon::parse($this->attributes['date'])->format('d/m-Y');
    }
}
