<?php

namespace galeriamedica\Policies;

use galeriamedica\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the model.
     *
     * @param  \galeriamedica\User  $user
     * @param  \galeriamedica\User  $model
     * @return mixed
     */
    public function view(User $user, User $model)
    {
        if (Auth::check() && $user->type == 'Admin') {
            return true;
        }
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \galeriamedica\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \galeriamedica\User  $user
     * @param  \galeriamedica\User  $model
     * @return mixed
     */
    public function update(User $user)
    {
        if (Auth::check() && $user->type == 'Admin') {
            return true;
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \galeriamedica\User  $user
     * @param  \galeriamedica\User  $model
     * @return mixed
     */
    public function delete(User $user)
    {
        if (Auth::check() && $user->id > 0) {
            return true;
        }
    }

    public function panelAdmin(User $user)
    {
        if (Auth::check() && $user->type == 'Admin') {
            return true;
        }
    }

    public function cambiarInformacion(User $user)
    {
        if (Auth::check() && Auth::id() === $user->id ) {
            return true;
        }
    }

    public function modificarRol(User $user)
    {
        if (Auth::check() && $user->type == 'Admin' ) {
            return true;
        }
    }
}
