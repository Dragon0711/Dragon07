<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SubCategoryPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }


    public function viewAll(User $user)
    {
        return  $user->hasPermission('view_all_Subcat');

    }

    public function show(User $user)
    {
        return  $user->hasPermission('view_Subcat');

    }

    public function create(User $user)
    {
        return  $user->hasPermission('create_Subcat');

    }

    public function edit(User $user)
    {
        return  $user->hasPermission('edit_Subcat');

    }

    public function update(User $user)
    {
        return  $user->hasPermission('update_Subcat');

    }

    public function delete(User $user)
    {
        return  $user->hasPermission('delete_Subcat');

    }
}
