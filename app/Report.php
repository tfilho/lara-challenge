<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Jenssegers\Mongodb\Eloquent\HybridRelations;

class Report extends Model
{
    use HybridRelations,
        SoftDeletes;

    //protected $connection = 'mysql';

    protected $fillable = [
        'topic', 'description', 'profile_id'
    ];

    public function profile()
    {
        return $this->belongsTo(Profile::class)->withTrashed();
    }
}
