<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function adminView(User $user)
    {
        return $user->user_type == 'admin';
    }

    public function lecAdminView(User $user)
    {
        switch ($user->user_type) {
            case 'admin':
                return true;
            case 'lecturer':
                return true;
            default:
                return false;
        }
    }

    public function lecStudentView(User $user)
    {
        switch ($user->user_type) {
            case 'lecturer':
                return true;
            case 'student':
                return true;
            default:
                return false;
        }
    }

    public function onlyStudent(User $user){
        return $user->user_type == 'student';
    }
}
