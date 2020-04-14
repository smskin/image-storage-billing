<?php

namespace App\Policies;

use App\DBContext\DBContextUser;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class UserPolicy
{
    use HandlesAuthorization;

    /** @noinspection PhpInconsistentReturnPointsInspection */
    public function before(DBContextUser $user)
    {
        if ($user->isSystemAccount()){
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can view any d b context users.
     *
     * @param DBContextUser $user
     * @return Response
     */
    public function viewAny(DBContextUser $user): Response
    {
        return Response::deny();
    }

    /**
     * Determine whether the user can view the d b context user.
     *
     * @param DBContextUser $user
     * @param DBContextUser $dBContextUser
     * @return Response
     */
    public function view(DBContextUser $user, DBContextUser $dBContextUser): Response
    {
        return $user->id === $dBContextUser->id ? Response::allow() : Response::deny();
    }

    /**
     * Determine whether the user can create d b context users.
     *
     * @param DBContextUser $user
     * @return Response
     */
    public function create(DBContextUser $user): Response
    {
        return $this->viewAny($user);
    }

    /**
     * Determine whether the user can update the d b context user.
     *
     * @param DBContextUser $user
     * @param DBContextUser $dBContextUser
     * @return Response
     */
    public function update(DBContextUser $user, DBContextUser $dBContextUser): Response
    {
        return $this->view($user,$dBContextUser);
    }

    /**
     * Determine whether the user can delete the d b context user.
     *
     * @param DBContextUser $user
     * @param DBContextUser $dBContextUser
     * @return Response
     */
    public function delete(DBContextUser $user, DBContextUser $dBContextUser): Response
    {
        return $this->view($user,$dBContextUser);
    }

    /**
     * Determine whether the user can restore the d b context user.
     *
     * @param DBContextUser $user
     * @param DBContextUser $dBContextUser
     * @return Response
     */
    public function restore(DBContextUser $user, DBContextUser $dBContextUser): Response
    {
        return $this->view($user,$dBContextUser);
    }

    /**
     * Determine whether the user can permanently delete the d b context user.
     *
     * @param DBContextUser $user
     * @param DBContextUser $dBContextUser
     * @return Response
     */
    public function forceDelete(DBContextUser $user, DBContextUser $dBContextUser): Response
    {
        return $this->view($user,$dBContextUser);
    }
}
