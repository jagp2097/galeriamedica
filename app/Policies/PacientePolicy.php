<?php

namespace galeriamedica\Policies;

use galeriamedica\User;
use galeriamedica\Paciente;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class PacientePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the paciente.
     *
     * @param  \galeriamedica\User  $user
     * @param  \galeriamedica\Paciente  $paciente
     * @return mixed
     */
    public function view(User $user, Paciente $paciente)
    {
        if (Auth::check()) {
            return true;
        }
    }

    /**
     * Determine whether the user can create pacientes.
     *
     * @param  \galeriamedica\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        if (Auth::check() && $user->type == 'Admin') {
            return true;
        }
       
    }

    /**
     * Determine whether the user can update the paciente.
     *
     * @param  \galeriamedica\User  $user
     * @param  \galeriamedica\Paciente  $paciente
     * @return mixed
     */
    public function update(User $user, Paciente $paciente)
    {
        if (Auth::check() && $user->type == 'Admin') {
            return true;
        }
    }

    /**
     * Determine whether the user can delete the paciente.
     *
     * @param  \galeriamedica\User  $user
     * @param  \galeriamedica\Paciente  $paciente
     * @return mixed
     */
    public function delete(User $user, Paciente $paciente)
    {
        if (Auth::check() && $user->type == 'Admin' && $paciente->id > 0) {
            return true;
        }
    }

    public function columnaOpciones(User $user)
    {
        if (Auth::check()) {
            return true;
        }
    }

    public function columnaAlbumes(User $user)
    {
        if (Auth::check()) {
            return true;
        }
    } 

}
