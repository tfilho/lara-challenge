<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\HybridRelations;

class Gender extends Model
{
    use HybridRelations;

    protected $connection = 'mysql';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne|\Jenssegers\Mongodb\Relations\HasOne
     */
    public function profile()
    {
        return $this->hasOne(Profile::class);
    }
}
