<?php

namespace App\Observers;

use App\Profile;

class UserObserver
{
    public function created($user)
    {
        $profile = new Profile();
        $user->profile()->save($profile);
    }
}
