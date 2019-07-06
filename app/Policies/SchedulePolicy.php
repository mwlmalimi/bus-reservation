<?php

namespace App\Policies;

use App\User;
use App\Schedule;
use Illuminate\Auth\Access\HandlesAuthorization;

class SchedulePolicy
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
     * Determine whether the user can view the schedule.
     *
     * @param  \App\User  $user
     * @param  \App\Schedule  $schedule
     * @return mixed
     */
    public function view(User $user, Schedule $schedule)
    {
        //
    }

    /**
     * Determine whether the user can create schedules.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the schedule.
     *
     * @param  \App\User  $user
     * @param  \App\Schedule  $schedule
     * @return mixed
     */
    public function update(User $user, Schedule $schedule)
    {
        //
    }

    /**
     * Determine whether the user can delete the schedule.
     *
     * @param  \App\User  $user
     * @param  \App\Schedule  $schedule
     * @return mixed
     */
    public function delete(User $user, Schedule $schedule)
    {
        //
    }

    /**
     * Determine whether the user can restore the schedule.
     *
     * @param  \App\User  $user
     * @param  \App\Schedule  $schedule
     * @return mixed
     */
    public function restore(User $user, Schedule $schedule)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the schedule.
     *
     * @param  \App\User  $user
     * @param  \App\Schedule  $schedule
     * @return mixed
     */
    public function forceDelete(User $user, Schedule $schedule)
    {
        //
    }
}
