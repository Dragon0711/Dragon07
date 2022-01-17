<?php

namespace App\Http\Controllers;


use App\Http\Interfaces\RoleInterface;
use App\Models\Role;
use Illuminate\Http\Request;


class RoleController extends Controller
{



    private $roleInterface;

    public function __construct(RoleInterface $roleInterface){

        $this->roleInterface = $roleInterface;

//        $this->middleware('auth:admin');
    }


    public function AllAdmins()
    {
        $this->authorize('show',Role::class);

        return $this->roleInterface->AllAdmins();
    }

    public function AddAdmin()
    {
        $this->authorize('show',Role::class);

        return $this->roleInterface->AddAdmin();
    }

    public function storeAdmin(Request $request)
    {
        $this->authorize('show',Role::class);

        return $this->roleInterface->storeAdmin($request);
    }

    public function editAdmin(Request $request)
    {
        $this->authorize('show',Role::class);

        return $this->roleInterface->editAdmin($request);
    }

    public function updateAdmin(Request $request)
    {
        $this->authorize('show',Role::class);

        return $this->roleInterface->updateAdmin($request);
    }

    public function deleteAdmin(Request $request)
    {
        $this->authorize('show',Role::class);

        return $this->roleInterface->deleteAdmin($request);
    }

    public function addRole()
    {
        $this->authorize('show',Role::class);

        return $this->roleInterface->addRole();
    }

    public function createRole(Request $request)
    {
        $this->authorize('show',Role::class);

        return $this->roleInterface->createRole($request);
    }



}
