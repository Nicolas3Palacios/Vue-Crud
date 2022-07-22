<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Son extends Model
{
    use HasFactory;

    protected $fillable = ['name','address', 'age','person_id'];

    public function parent()
    {
        return $this->belongsTo(Person::class);
    }
}
