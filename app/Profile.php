<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;

class Profile extends Model
{
    use SoftDeletes;
    /**
     * The connection name for the model.
     *
     * @var string
     */
    protected $connection = 'mongodb';

    /**
     * @var string
     */
    protected $collection = 'profiles';

    /**
     * @var string[]
     */
    protected $fillable = [
        'user_id', 'first_name', 'last_name','birthday','gender_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }

    public function report()
    {
        return $this->hasOne(Report::class);
    }
}
