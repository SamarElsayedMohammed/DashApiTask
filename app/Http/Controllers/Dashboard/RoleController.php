<?php

namespace App\Http\Controllers\Dashboard;

use App\Traits\ResponseDash;
use Illuminate\Http\Request;
use App\Services\RoleService;
use Yajra\DataTables\DataTables;
use App\DataTables\RolesDataTable;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;
use App\Http\Requests\Dashboard\RoleRequest;

class RoleController extends Controller
{
    use ResponseDash;
    public $roleService;

    function __construct(RoleService $roleService)
    {
        $this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:role-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:role-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:role-delete', ['only' => ['destroy']]);
        $this->roleService = $roleService;
    }
    public function index(RolesDataTable $rolesDataTable)
    {
        try {
            return $rolesDataTable->render('dashboard.roles.index');
        } catch (\Throwable $th) {
            return $this->error('something go to wrong try later', 'admin.home');

        }


    }


    public function create()
    {
        try {
            $role = new Role;
            $rolePermissions = $this->roleService->getRolePermissions(null);
            return view('dashboard.roles.create', compact('role', 'rolePermissions'));
        } catch (\Throwable $th) {
            return $this->error('something go to wrong try later', 'admin.home');

        }
    }


    public function store(RoleRequest $request)
    {
        try {

            $this->roleService->createNewRole(["name" => $request->input('name')], $request->input('permission'));

            return $this->success('Role created successfully', 'admin.roles.index');

        } catch (\Throwable $th) {
            return $this->error('something go to wrong try later', 'admin.home');

        }
    }
    public function edit($id)
    {
        try {

            $role = $this->roleService->FindById($id);

            $rolePermissions = $this->roleService->getRolePermissions($id);
            return view('dashboard.roles.edit', compact('role', 'rolePermissions'));
        } catch (\Throwable $th) {
            return $this->error('something go to wrong try later', 'admin.home');

        }
    }


    public function update(RoleRequest $request, $id)
    {
        try {

            $this->roleService->UpdateRole(['name' => $request->input('name')], $id, $request->input('permission'));

            return $this->success('Role updated successfully', 'admin.roles.index');
        } catch (\Throwable $th) {
            return $this->error('something go to wrong try later', 'admin.home');

        }
    }

    public function destroy($id)
    {
        try {
            DB::table("roles")->where('id', $id)->delete();

            return $this->success('Role deleted successfully', 'admin0.roles.index');

        } catch (\Throwable $th) {
            return $this->error('something go to wrong try later', 'admin.home');

        }

    }

}
