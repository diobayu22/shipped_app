<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Shipment extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function container()
    {
        return $this->belongsTo(Container::class, 'container_id', 'name');
    }

    // public function item()
    // {
    //     return $this->belongsTo(Item::class, 'item_id', 'id');
    // }

    public function item()
    {
        return $this->belongsTo(Item::class)->withDefault();
    }
}
