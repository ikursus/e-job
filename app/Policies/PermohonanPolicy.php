<?php

namespace App\Policies;

use App\Models\Permohonan;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PermohonanPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Permohonan $permohonan): bool
    {
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Permohonan $permohonan): bool
    {
        // Semak jika user ada role admin. Jika ya allow untuk lihat semua permohonan
        if ($user->hasRole('admin') || $user->hasRole('super admin')) {
            return true;
        }

        // Jika tidak, pastikan user hanya boleh buka dan kemaskini
        // permohonan yang dibuat oleh user tersebut sahaja
        return $user->id === $permohonan->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Permohonan $permohonan): bool
    {
        if ($user->hasRole('admin') || $user->hasRole('super admin')) {
            return true;
        };

        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Permohonan $permohonan): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Permohonan $permohonan): bool
    {
        return false;
    }
}
