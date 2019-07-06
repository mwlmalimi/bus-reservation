<?php

namespace App\Policies;

use App\User;
use App\CompanyRoute;
use Illuminate\Auth\Access\HandlesAuthorization;

class CompanyRoutePolicy
{
    use HandlesAuthorization;
public function before($user, $ability)
{
  if(users->company_id === null)
{
    return false ;
}
return true;
}
    /**
     * Determine whether the user can view the company route.
     *
     * @param  \App\User  $user
     * @param  \App\CompanyRoute  $companyRoute
     * @return mixed
     */
    public function view(User $user, CompanyRoute $companyRoute)
    {
        //
    }

    /**
     * Determine whether the user can create company routes.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the company route.
     *
     * @param  \App\User  $user
     * @param  \App\CompanyRoute  $companyRoute
     * @return mixed
     */
    public function update(User $user, CompanyRoute $companyRoute)
    {
        //
    }

    /**
     * Determine whether the user can delete the company route.
     *
     * @param  \App\User  $user
     * @param  \App\CompanyRoute  $companyRoute
     * @return mixed
     */
    public function delete(User $user, CompanyRoute $companyRoute)
    {
        //
    }

    /**
     * Determine whether the user can restore the company route.
     *
     * @param  \App\User  $user
     * @param  \App\CompanyRoute  $companyRoute
     * @return mixed
     */
    public function restore(User $user, CompanyRoute $companyRoute)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the company route.
     *
     * @param  \App\User  $user
     * @param  \App\CompanyRoute  $companyRoute
     * @return mixed
     */
    public function forceDelete(User $user, CompanyRoute $companyRoute)
    {
        //
    }
}
