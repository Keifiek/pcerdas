<?php

namespace App\Policies;

use App\Models\Producto;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ProductoPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->id == 1;
    }

    public function view(User $user, Producto $producto): bool
    {
        return $user->id == 1;
    }

    public function create(User $user): bool
    {
        return $user->id == 1;
    }

    public function update(User $user, Producto $producto): bool
    {
        return $user->id == 1;
    }

    public function delete(User $user, Producto $producto): bool
    {
        return $user->id == 1;
    }

    public function restore(User $user, Producto $producto): bool
    {
        return $user->id == 1;
    }

    public function forceDelete(User $user, Producto $producto): bool
    {
        return $user->id == 1;
    }
}
