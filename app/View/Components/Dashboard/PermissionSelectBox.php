<?php

namespace App\View\Components\Dashboard;

use Illuminate\View\Component;
use Spatie\Permission\Models\Permission;

class PermissionSelectBox extends Component
{
    public $permissions ;
    public $rolePermissions;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(array $rolePermissions)
    {
        $this->permissions = Permission::get();
        $this->rolePermissions = $rolePermissions;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.dashboard.permission-select-box');
    }
}
