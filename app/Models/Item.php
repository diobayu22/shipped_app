<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $cascadeDeletes = ['shipments'];

    public function shipments()
    {
        return $this->hasMany(Shipment::class);
    }



    public function uom()
    {
        return $this->belongsTo(Uom::class, 'uom_id', 'id');
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id', 'id');
    }
}
