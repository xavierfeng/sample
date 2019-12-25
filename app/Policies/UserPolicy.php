<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
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

    //授权策略   更新只能更自己
    public function update(User $currentUser, User $user)
    {
        return $currentUser->id === $user->id;
    }

    //授权策略   删除人必须有admin权限 && 删除的人不能是自己
    public function destroy(User $currentUser, User $user)
    {
        return $currentUser->is_admin && $currentUser->id !== $user->id;
    }
}
