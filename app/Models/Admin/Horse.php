<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horse extends Model
{
    use HasFactory;

    protected $primaryKey = 'horse_id';

    public function races()
    {
        return $this->belongsToMany(Race::class, 'horse_race','horse_id','race_id')
            ->withPivot('form');
    }

    public function getNameAttribute($value)
    {
        return ucfirst($value);
    }
}
