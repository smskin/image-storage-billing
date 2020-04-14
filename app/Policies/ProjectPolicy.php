<?php

namespace App\Policies;

use App\DBContext\DBContextProject;
use App\DBContext\DBContextUser;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class ProjectPolicy
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
     * Determine whether the user can view any d b context projects.
     *
     * @param DBContextUser $user
     * @param DBContextUser $dBContextUser
     * @return Response
     */
    public function viewAny(DBContextUser $user, DBContextUser $dBContextUser): Response
    {
        return $user->id === $dBContextUser->id ? Response::allow() : Response::deny();
    }

    /**
     * Determine whether the user can view the d b context project.
     *
     * @param DBContextUser $user
     * @param DBContextProject $dBContextProject
     * @return Response
     */
    public function view(DBContextUser $user, DBContextProject $dBContextProject): Response
    {
        return $user->id === $dBContextProject->user_id ? Response::allow() : Response::deny();
    }

    /**
     * Determine whether the user can create d b context projects.
     *
     * @param DBContextUser $user
     * @param DBContextUser $dBContextUser
     * @return Response
     */
    public function create(DBContextUser $user, DBContextUser $dBContextUser): Response
    {
        return $this->viewAny($user, $dBContextUser);
    }

    /**
     * Determine whether the user can update the d b context project.
     *
     * @param DBContextUser $user
     * @param DBContextProject $dBContextProject
     * @return Response
     */
    public function update(DBContextUser $user, DBContextProject $dBContextProject): Response
    {
        return $this->view($user, $dBContextProject);
    }

    /**
     * Determine whether the user can delete the d b context project.
     *
     * @param DBContextUser $user
     * @param DBContextProject $dBContextProject
     * @return Response
     */
    public function delete(DBContextUser $user, DBContextProject $dBContextProject): Response
    {
        return $this->view($user, $dBContextProject);
    }

    /**
     * Determine whether the user can restore the d b context project.
     *
     * @param DBContextUser $user
     * @param DBContextProject $dBContextProject
     * @return Response
     */
    public function restore(DBContextUser $user, DBContextProject $dBContextProject): Response
    {
        return $this->view($user, $dBContextProject);
    }

    /**
     * Determine whether the user can permanently delete the d b context project.
     *
     * @param DBContextUser $user
     * @param DBContextProject $dBContextProject
     * @return Response
     */
    public function forceDelete(DBContextUser $user, DBContextProject $dBContextProject): Response
    {
        return $this->view($user, $dBContextProject);
    }
}
