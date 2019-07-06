<?php

namespace App\Policies;

use App\User;
use App\Bus;
use Illuminate\Auth\Access\HandlesAuthorization;

class BusPolicy
{
    use HandlesAuthorization;


    public function before($user, $ability)
    {
      if ($user->company_id === null) {//The user is super-admin
        return false;
      }
      return true;
    }

    /**
     * Determine whether the user can view the bus.
     *
     * @param  \App\User  $user
     * @param  \App\Bus  $bus
     * @return mixed
     */
    public function view(User $user, Bus $bus)
    {
        //
    }

    /**
     * Determine whether the user can create buses.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the bus.
     *
     * @param  \App\User  $user
     * @param  \App\Bus  $bus
     * @return mixed
     */
    public function update(User $user, Bus $bus)
    {
        //
    }

    /**
     * Determine whether the user can delete the bus.
     *
     * @param  \App\User  $user
     * @param  \App\Bus  $bus
     * @return mixed
     */
    public function delete(User $user, Bus $bus)
    {
        //
    }

    /**
     * Determine whether the user can restore the bus.
     *
     * @param  \App\User  $user
     * @param  \App\Bus  $bus
     * @return mixed
     */
    public function restore(User $user, Bus $bus)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the bus.
     *
     * @param  \App\User  $user
     * @param  \App\Bus  $bus
     * @return mixed
     */
    public function forceDelete(User $user, Bus $bus)
    {
        //
    }
}
