<?php

namespace App\Policies;

use App\Models\GeneralUser;
use App\Models\Topic;
use Illuminate\Auth\Access\Response;

class TopicPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(GeneralUser $generalUser): bool
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(GeneralUser $generalUser, Topic $topic): bool
    {
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(GeneralUser $generalUser): bool
    {
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(GeneralUser $generalUser, Topic $topic): bool
    {
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(GeneralUser $generalUser, Topic $topic): bool
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(GeneralUser $generalUser, Topic $topic): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(GeneralUser $generalUser, Topic $topic): bool
    {
        return false;
    }
}
