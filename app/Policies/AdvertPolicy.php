<?php

namespace App\Policies;

use App\User;
use App\Advert;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdvertPolicy
{
    use HandlesAuthorization;
    
    /**
     * Determine whether the user can view any adverts.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the advert.
     *
     * @param  \App\User  $user
     * @param  \App\Advert  $advert
     * @return mixed
     */
    public function view(?User $user, Advert $advert)
    {
        if($advert->approved==1 && is_null($user)){ // gäst
            return true;
        }
        elseif($advert->approved==0 && is_null($user)){ // gäst
            return false;
        }
        elseif(($advert->user_id == $user->id) ||  $user->isAdmin()){ // annonsägare eller admin
            return true;
        }
        elseif($advert->approved==1 && !is_null($user) && ($advert->user_id != $user->id)){ // inloggad annonsör, ej annonsägare
            return true;
        }
        else {  // utifall missat nått
            return false;
        }

    }

    /**
     * Determine whether the user can create adverts.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
    }

    /**
     * Determine whether the user can update the advert.
     *
     * @param  \App\User  $user
     * @param  \App\Advert  $advert
     * @return mixed
     */
    public function update(User $user, Advert $advert)
    {
        return ($advert->user_id == $user->id) ||  $user->isAdmin();
    }

    /**
     * Determine whether the user can delete the advert.
     *
     * @param  \App\User  $user
     * @param  \App\Advert  $advert
     * @return mixed
     */
    public function delete(User $user, Advert $advert)
    {
        return ($advert->user_id == $user->id) ||  $user->isAdmin();
    }

    /**
     * Determine whether the user can restore the advert.
     *
     * @param  \App\User  $user
     * @param  \App\Advert  $advert
     * @return mixed
     */
    public function restore(User $user, Advert $advert)
    {
        return ($advert->user_id == $user->id) ||  $user->isAdmin();
    }

    /**
     * Determine whether the user can permanently delete the advert.
     *
     * @param  \App\User  $user
     * @param  \App\Advert  $advert
     * @return mixed
     */
    public function forceDelete(User $user, Advert $advert)
    {
        return ($advert->user_id == $user->id) ||  $user->isAdmin();
    }
}
