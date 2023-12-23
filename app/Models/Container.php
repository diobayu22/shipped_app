<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Container extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $guarded = [];

    public function shipment()
    {
        return $this->belongsTo(Shipment::class);
    }
}
