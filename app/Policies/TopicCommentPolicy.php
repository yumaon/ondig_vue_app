<?php

namespace App\Policies;

use App\Models\GeneralUser;
use App\Models\TopicComment;
use Illuminate\Auth\Access\Response;

class TopicCommentPolicy
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
    public function view(GeneralUser $generalUser, TopicComment $topicComment): bool
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
    public function update(GeneralUser $generalUser, TopicComment $topicComment): bool
    {
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(GeneralUser $generalUser, TopicComment $topicComment): bool
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(GeneralUser $generalUser, TopicComment $topicComment): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(GeneralUser $generalUser, TopicComment $topicComment): bool
    {
        return false;
    }
}
