<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class RoleService
{
    public function createNewRole(array $roleData,$permission)
    {
        $role = Role::create($roleData);

        $this->updatePermissions($role,$permission);
        return $role;

    }

    public function UpdateRole(array $roleData, $id,$permission)
    {
        $role = $this->FindById($id);
        
        $role->update($roleData);

        $this->updatePermissions($role, $permission);
        return $role;
    }

    public function FindById($id)
    {
        return Role::find($id);
    }

    public function updatePermissions(Role $role,$permission){

        $role->syncPermissions($permission);
        return $role;

    }

    public function getRolePermissions($id){

        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id", $id)
            ->pluck('role_has_permissions.permission_id')
            ->all();
            return $rolePermissions;
    }


}
