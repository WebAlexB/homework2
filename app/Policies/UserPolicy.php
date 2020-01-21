<?php

namespace App\Policies;

use App\User;
use App\odel;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the odel.
     *
     * @param  \App\User  $user
     * @param  \App\odel  $odel
     * @return mixed
     */
    public function view(User $user, User $model)
    {
        return $user->id === $model->id;
    }

    /**
     * Determine whether the user can create odels.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the odel.
     *
     * @param  \App\User  $user
     * @param  \App\odel  $odel
     * @return mixed
     */
    public function update(User $user, User $model)
    {
        return $user->id === $model->id;
    }

    /**
     * Determine whether the user can delete the odel.
     *
     * @param  \App\User  $user
     * @param  \App\odel  $odel
     * @return mixed
     */
    public function delete(User $user, User $model)
    {
        return $user->id = $model->id;
    }

    /**
     * Determine whether the user can restore the odel.
     *
     * @param  \App\User  $user
     * @param  \App\odel  $odel
     * @return mixed
     */
    public function restore(User $user, User $model)
    {
        return $user->id = $model->id;
    }

    /**
     * Determine whether the user can permanently delete the odel.
     *
     * @param  \App\User  $user
     * @param  \App\odel  $odel
     * @return mixed
     */
    public function forceDelete(User $user, User $model)
    {
        return $user->id === $model->id;
    }
}
