<?php

namespace App\Policies;

use App\Models\Admin;
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


    public function viewAll(Admin $admin)
    {
        return  $admin->hasPermission('view_all_Subcat');

    }

    public function show(Admin $admin)
    {
        return  $admin->hasPermission('view_Subcat');

    }

    public function create(Admin $admin)
    {
        return  $admin->hasPermission('create_Subcat');

    }

    public function edit(Admin $admin)
    {
        return  $admin->hasPermission('edit_Subcat');

    }

    public function update(Admin $admin)
    {
        return  $admin->hasPermission('update_Subcat');

    }

    public function delete(Admin $admin)
    {
        return  $admin->hasPermission('delete_Subcat');

    }
}
