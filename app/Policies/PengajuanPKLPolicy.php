<?php

namespace App\Policies;

use App\Models\PengajuanPKL;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PengajuanPKLPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(?User $user): bool
    {
        return true; // For now, allow all since no auth
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(?User $user, PengajuanPKL $pengajuanPKL): bool
    {
        return true; // For now, allow all since no auth
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(?User $user): bool
    {
        return true; // For now, allow all since no auth
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(?User $user, PengajuanPKL $pengajuanPKL): bool
    {
        return $pengajuanPKL->status == 'pending'; // Allow update if pending
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(?User $user, PengajuanPKL $pengajuanPKL): bool
    {
        return $pengajuanPKL->status == 'pending'; // Allow delete if pending
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, PengajuanPKL $pengajuanPKL): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, PengajuanPKL $pengajuanPKL): bool
    {
        return false;
    }
}
