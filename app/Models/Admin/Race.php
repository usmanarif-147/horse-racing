<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Race extends Model
{
    use HasFactory;

    protected $primaryKey = 'race_id';

    public function track()
    {
        return $this->belongsTo(Track::class,'track_id','track_id');
    }

    public function horses()
    {
        return $this->belongsToMany(Horse::class, 'horse_race','race_id','horse_id')
            ->withPivot('form');
    }
}
