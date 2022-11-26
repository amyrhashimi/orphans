<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AttributeChild extends Model
{
    use HasFactory, SoftDeletes;

    public $fillable = [
        'attribute_id',
        'user_id',
        'value'
    ];

    public function child()
    {
        return $this->hasOne(Child::class);
    }

    public function attribute()
    {
        return $this->hasOne(Attribute::class);
    }
}
