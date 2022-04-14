<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPackages extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function products()
    {
        return $this->belongsTo(Products::class, 'id_product');
    }

    public function packages()
    {
        return $this->belongsTo(Packages::class, 'id_package');
    }

}
