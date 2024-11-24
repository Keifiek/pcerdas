<?php

namespace App\Policies;

use App\Models\Proveedor;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ProveedorPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->id == 1;
    }

    public function view(User $user, Proveedor $proveedor): bool
    {
        return $user->id == 1;
    }

    public function create(User $user): bool
    {
        return $user->id == 1;
    }


    public function update(User $user, Proveedor $proveedor): bool
    {
        return $user->id == 1;
    }

    public function delete(User $user, Proveedor $proveedor): bool
    {
        return $user->id == 1;
    }

    public function restore(User $user, Proveedor $proveedor): bool
    {
        return $user->id == 1;
    }

    public function forceDelete(User $user, Proveedor $proveedor): bool
    {
        return $user->id == 1;
    }
}
