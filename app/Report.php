<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\HybridRelations;

class Report extends Model
{
    use HybridRelations;

    //protected $connection = 'mysql';

    protected $fillable = [
        'topic', 'description', 'profile_id'
    ];

    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }
}
