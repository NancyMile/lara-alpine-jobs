<?php

namespace App\Policies;

use App\Models\Job;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class JobPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(?User $user): bool
    {
        //anyone can see the list of jobs no need to be authenticated to see it
        return true;
    }

    public function viewAnyEmployer(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(?User $user, Job $job): bool
    {
        //anyone can see a job
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //
        return $user->employer  != null; //employer can update
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Job $job): bool|Response
    {
        //check that is  the creator of the job
        if($job->employer->user_id != $user->id){
            return false;
        }

        //check if the job has applicants
        if($job->jobApplications()->count () >0){
            return Response::deny('Can not change jobs with applications');
        }

        return true;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Job $job): bool
    {
        return $job->employer->user_id === $user->id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Job $job): bool
    {
        return $job->employer->user_id === $user->id;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Job $job): bool
    {
        //
        return false;
    }

    public function apply(User $user, Job $job): bool
    {
        return !$job->hasUserApplied($user);
    }
}
