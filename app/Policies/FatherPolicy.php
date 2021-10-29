<?php

namespace App\Policies;

use App\Models\Father;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class FatherPolicy
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
     * @param  \App\Models\Father  $father
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Father $father)
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
     * @param  \App\Models\Father  $father
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Father $father)
    {
        if($user->isUser() && $user->monk->father != null && $user->monk->father->id == $father->id){
            return true;
        } else if($user->isManager() && $user->monk->dratshang->id == $father->monk->dratshang->id) {
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
     * @param  \App\Models\Father  $father
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Father $father)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Father  $father
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Father $father)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Father  $father
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Father $father)
    {
        //
    }
}
