<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model
{
    use HasFactory, SoftDeletes;

    public $fillable = [
        'attribute_id',
        'value',
        'title',
        'desc'
    ];

    public function attribute()
    {
        return $this->hasOne(Attribute::class);
    }

    public function attributes()
    {
        return $this->belongsToMany(Attribute::class);
    }
}
