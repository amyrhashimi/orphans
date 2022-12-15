<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Attribute extends Model
{
    use HasFactory, SoftDeletes;
    public $fillable = [
        'name',
        'value',
        'editable',
        'status'
    ];

    public function childrens()
    {
        return $this->hasMany(Child::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function validations() {
        return $this->belongsToMany(Validation::class);
    }

    public function pages()
    {
        return $this->hasMany(Page::class);
    }
}
