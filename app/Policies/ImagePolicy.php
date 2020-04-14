<?php

namespace App\Policies;

use App\DBContext\DBContextImage;
use App\DBContext\DBContextProject;
use App\DBContext\DBContextUser;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class ImagePolicy
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
     * Determine whether the user can view any d b context images.
     *
     * @param DBContextUser $user
     * @param DBContextProject $dBContextProject
     * @return Response
     */
    public function viewAny(DBContextUser $user, DBContextProject $dBContextProject): Response
    {
        return $user->id === $dBContextProject->user_id ? Response::allow() : Response::deny();
    }

    /**
     * Determine whether the user can view the d b context image.
     *
     * @param DBContextUser $user
     * @param DBContextImage $dBContextImage
     * @return Response
     */
    public function view(DBContextUser $user, DBContextImage $dBContextImage): Response
    {
        return $user->id === $dBContextImage->user_id ? Response::allow() : Response::deny();
    }

    /**
     * Determine whether the user can create d b context images.
     *
     * @param DBContextUser $user
     * @param DBContextProject $dBContextProject
     * @return Response
     */
    public function create(DBContextUser $user, DBContextProject $dBContextProject): Response
    {
        return $this->viewAny($user, $dBContextProject);
    }

    /**
     * Determine whether the user can update the d b context image.
     *
     * @param DBContextUser $user
     * @param DBContextImage $dBContextImage
     * @return Response
     */
    public function update(DBContextUser $user, DBContextImage $dBContextImage): Response
    {
        return $this->view($user, $dBContextImage);
    }

    /**
     * Determine whether the user can delete the d b context image.
     *
     * @param DBContextUser $user
     * @param DBContextImage $dBContextImage
     * @return Response
     */
    public function delete(DBContextUser $user, DBContextImage $dBContextImage): Response
    {
        return $this->view($user, $dBContextImage);
    }

    /**
     * Determine whether the user can restore the d b context image.
     *
     * @param DBContextUser $user
     * @param DBContextImage $dBContextImage
     * @return Response
     */
    public function restore(DBContextUser $user, DBContextImage $dBContextImage): Response
    {
        return $this->view($user, $dBContextImage);
    }

    /**
     * Determine whether the user can permanently delete the d b context image.
     *
     * @param DBContextUser $user
     * @param DBContextImage $dBContextImage
     * @return Response
     */
    public function forceDelete(DBContextUser $user, DBContextImage $dBContextImage): Response
    {
        return $this->view($user, $dBContextImage);
    }
}
