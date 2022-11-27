<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Validation extends Model
{
    use HasFactory;
    public $fillable = [
        'title',
        'value'
    ];

    public function attributes() {
        return $this->hasMany(Attribute::class);
    }
}
