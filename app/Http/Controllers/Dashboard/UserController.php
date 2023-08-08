<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Services\UserService;
use App\DataTables\UsersDataTable;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\UserRequest;

class UserController extends Controller
{
    private UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }
    public function index(UsersDataTable $dataTable)
    {
        return $dataTable->render('dashboard.users.index');
    }
    public function create()
    {
        $user = new User;
        $roles = Role::all();

        return view('dashboard.users.create', compact('user', 'roles'));
    }
    public function store(UserRequest $request)
    {

        $user = $this->userService->createNewUser($request->all());
        $this->userService->createUserRole($user, $request->input('roles'));


        return redirect()->route('admin.users')
            ->with('success', 'User created successfully');
    }

    public function edit($id)
    {
        $user = $this->userService->FindById($id);

        $roles = Role::all();
        $userRole = $user->roles->first();

        if (!($user))
            return redirect()->route('admin.users')
                ->with('danger', 'User not found');

        return view('dashboard.users.edit', compact('user', 'roles', 'userRole'));
    }


    public function update(UserRequest $request, $id)
    {
        $input = $request->all();
        if (empty($input['password'])) {
            $input = Arr::except($input, array('password'));
        }

        $user = $this->userService->UpdateUser($input, $id);

        $this->userService->UpdateUserRole($user, $input["roles"]);


        return redirect()->route('admin.users')
            ->with('success', 'User updated successfully');
    }


    public function destroy($id)
    {

        $user = $this->userService->FindById($id);

        if (!($user))
            return redirect()->route('dash.users')
                ->with('danger', 'User not found');

        $user->delete();

        return redirect()->route('admin.users')
            ->with('success', 'User deleted successfully');
    }

}
