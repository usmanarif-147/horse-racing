<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Track extends Model
{
    use HasFactory;

    protected $primaryKey = 'track_id';

    public function races()
    {
        return $this->hasMany(Race::class, 'track_id','track_id');
    }
}
