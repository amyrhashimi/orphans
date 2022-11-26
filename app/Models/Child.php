<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Child extends Model
{
    use HasFactory, SoftDeletes;
    public $fillable = [
        'user_id',
        'name',
        'name_father'
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function attributes()
    {
        return $this->belongsToMany(Attribute::class);
    }
}
