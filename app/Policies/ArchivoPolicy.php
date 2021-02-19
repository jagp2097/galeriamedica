<?php

namespace galeriamedica\Policies;

use galeriamedica\User;
use galeriamedica\Archivo;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class ArchivoPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the archivo.
     *
     * @param  \galeriamedica\User  $user
     * @param  \galeriamedica\Archivo  $archivo
     * @return mixed
     */
    public function view(User $user, Archivo $archivo)
    {
        if (Auth::check()) {
            return true;
        }
    }

    /**
     * Determine whether the user can create archivos.
     *
     * @param  \galeriamedica\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        if (Auth::check() && $user->type == "Admin") {
            return true;
        }
    }

    /**
     * Determine whether the user can update the archivo.
     *
     * @param  \galeriamedica\User  $user
     * @param  \galeriamedica\Archivo  $archivo
     * @return mixed
     */
    public function update(User $user, Archivo $archivo)
    {
        if (Auth::check() && $user->type == 'Admin' && $archivo->id > 0) {
            return true;
        }
    }

    /**
     * Determine whether the user can delete the archivo.
     *
     * @param  \galeriamedica\User  $user
     * @param  \galeriamedica\Archivo  $archivo
     * @return mixed
     */
    public function delete(User $user, Archivo $archivo)
    {
        if (Auth::check() && $user->type == 'Admin' && $archivo->id > 0) {
            return true;
        }
    }
}
