<?php

namespace App\View\Components\Dashboard;

use App\Services\RoleService;
use Illuminate\View\Component;

class RolePermissionsConponent extends Component
{
    public $rolePermissions;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(RoleService $roleService,$id)
    {
        $this->rolePermissions = $roleService->getRolePermissions($id);

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.dashboard.role-permissions-conponent');
    }
}
