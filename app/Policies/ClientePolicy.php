<?php

namespace App\Policies;

use App\Models\Cliente;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ClientePolicy
{
    public function viewAny(User $user): bool
    {
        return $user->id == 1;
    }

    public function view(User $user, Cliente $cliente): bool
    {
        return $user->id == 1;
    }

    public function create(User $user): bool
    {
        return $user->id == 1;
    }

    public function update(User $user, Cliente $cliente): bool
    {
        return $user->id === 1;
    }

    public function delete(User $user, Cliente $cliente): bool
    {
        return $user->id == 1;
    }

    public function restore(User $user, Cliente $cliente): bool
    {
        return $user->id == 1;
    }
    
    public function forceDelete(User $user, Cliente $cliente): bool
    {
        return $user->id == 1;
    }
}
