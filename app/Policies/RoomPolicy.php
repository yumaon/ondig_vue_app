<?php

namespace App\Policies;

use App\Models\GeneralUser;
use App\Models\Room;
use Illuminate\Auth\Access\Response;

class RoomPolicy
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
    public function view(GeneralUser $generalUser, Room $room): bool
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
    public function update(GeneralUser $generalUser, Room $room): bool
    {
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(GeneralUser $generalUser, Room $room): bool
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(GeneralUser $generalUser, Room $room): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(GeneralUser $generalUser, Room $room): bool
    {
        return false;
    }
}
