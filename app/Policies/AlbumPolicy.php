<?php

namespace galeriamedica\Policies;

use galeriamedica\User;
use galeriamedica\Album;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class AlbumPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the album.
     *
     * @param  \galeriamedica\User  $user
     * @param  \galeriamedica\Album  $album
     * @return mixed
     */
    public function view(User $user, Album $album)
    {
        if (Auth::check()) {
            return true;
        }
    }

    /**
     * Determine whether the user can create albums.
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
     * Determine whether the user can update the album.
     *
     * @param  \galeriamedica\User  $user
     * @param  \galeriamedica\Album  $album
     * @return mixed
     */
    public function update(User $user, Album $album)
    {
        if (Auth::check() && $user->type == 'Admin' && $album->id > 0) {
            return true;
        }
    }

    /**
     * Determine whether the user can delete the album.
     *
     * @param  \galeriamedica\User  $user
     * @param  \galeriamedica\Album  $album
     * @return mixed
     */
    public function delete(User $user, Album $album)
    {
        if (Auth::check() && $user->type == 'Admin' && $album->id > 0) {
            return true;
        }
    }
}
