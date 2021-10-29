<?php

namespace App\Policies;

use App\Models\Monk;
use App\Models\User;
use App\Models\Role;
use Illuminate\Auth\Access\Response;
use Illuminate\Auth\Access\HandlesAuthorization;

class MonkPolicy
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
        return in_array($user->role_id, array(Role::ADMIN, Role::MANAGER, ROle::USER));
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Monk  $monk
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Monk $monk)
    {
        if($user->isUser() && $monk->user->id == $user->id){
            return true;
        } 
        else if($user->isManager() && $user->monk->dratshang->id == $monk->dratshang->id){
            return true;
        }
        else if ($user->isAdmin()){
            return true;
        }
        else {
            return false;
        }
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
     * @param  \App\Models\Monk  $monk
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Monk $monk)
    {
        if($user->isUser() && $monk->user->id == $user->id){
            return true;
        } else if($user->isManager() && $monk->dratshang->id == $user->monk->dratshang->id){
            return true;
        }else if($user->isAdmin()) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Monk  $monk
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Monk $monk)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Monk  $monk
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Monk $monk)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Monk  $monk
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Monk $monk)
    {
        if($user->isAdmin()){
            return true;
        }
        return false;
    }
}
