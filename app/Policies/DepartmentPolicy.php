<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Department;
use App\Models\Member;

class DepartmentPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(Member $member): bool
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(Member $member, Department $department): bool
    {
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(Member $member): bool
    {
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(Member $member, Department $department): bool
    {
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(Member $member, Department $department): bool
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(Member $member, Department $department): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(Member $member, Department $department): bool
    {
        return false;
    }
}
