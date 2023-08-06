<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserService
{

    public function createNewUser(array $userData)
    {
        $user = User::create($userData);
        return $user;

    }

    public function UpdateUser(array $userData, $id)
    {
        $user = $this->FindById($id);
        $user->update($userData);
        return $user ;
    }

    public function createUserRole(User $user ,$role){
        $user->assignRole($role);
        return $user;
    }
    public function UpdateUserRole(User $user, $role){
        DB::table('model_has_roles')->where('model_id', $user->id)->delete();

        $user->assignRole($role);
    }
    public function FindById($id){
        return User::find($id);
    }
}
