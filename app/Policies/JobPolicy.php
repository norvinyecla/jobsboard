<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\User;
use App\Job;

class JobPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
    * Determine if job post can be edited by the user
    *
    * @return bool
    */
    public function update(User $user, Job $job){
        return $user->id == $job->employer_id;
    }

    /**
    * Determine if job post can be deleted by the user
    *
    * @return bool
    */
    public function delete(User $user, Job $job){
        return $user->id == $job->employer_id;
    }

}
