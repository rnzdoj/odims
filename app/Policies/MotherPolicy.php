<?php

namespace App\Policies;

use App\Models\Mother;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class MotherPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Mother  $mother
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Mother $mother)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Mother  $mother
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Mother $mother)
    {
        if($user->isUser() && $user->monk->monther != null && $user->monk->mother->id == $mother->id){
            return true;
        } else if($user->isManager() && $user->monk->dratshang->id == $mother->monk->dratshang->id) {
            return true;
        } else if($user->isAdmin()) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Mother  $mother
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Mother $mother)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Mother  $mother
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Mother $mother)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Mother  $mother
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Mother $mother)
    {
        //
    }
}
