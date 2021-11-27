<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Content;

class Contentpolicy
{
    use HandlesAuthorization;

    public function edit(User $user, Content $content)
    {
        return $user->ownsContent($content);

    }
   
}
