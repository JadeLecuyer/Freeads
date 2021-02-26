<?php

namespace App\Policies;

use App\Models\Ad;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class AdPolicy
{
    use HandlesAuthorization;

    /**
     * Perform pre-authorization checks.
     *
     * @param  \App\Models\User  $user
     * @param  string  $ability
     * @return void|bool
     */
    public function before(User $user, $ability)
    {
        if ($user->admin) {
            return true;
        }
    }

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

        /**
     * Determine whether the user can view all models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    /*public function viewAll(User $user)
    {
        return $user->admin        
            ? Response::allow()
            : Response::deny('You are not an administrator.');
    }*/

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Ad  $ad
     * @return mixed
     */
    public function view(?User $user, Ad $ad)
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Ad  $ad
     * @return mixed
     */
    public function update(User $user, Ad $ad)
    {
        return $user->id === $ad->user_id
        ? Response::allow()
        : Response::deny('You do not own this ad.');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Ad  $ad
     * @return mixed
     */
    public function delete(User $user, Ad $ad)
    {
        return $user->id === $ad->user_id
        ? Response::allow()
        : Response::deny('You do not own this ad.');
    }
}
