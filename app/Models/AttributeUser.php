<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AttributeUser extends Model
{
    use HasFactory, SoftDeletes;

    public $fillable = [
        'attribute_id',
        'child_id',
        'value'
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function attribute()
    {
        return $this->hasOne(Attribute::class);
    }
}
