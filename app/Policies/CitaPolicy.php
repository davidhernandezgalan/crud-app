<?php

namespace App\Policies;

use App\Models\Cita;
use App\Models\User;

class CitaPolicy
{
    /**
     * Determina si el usuario puede ver todas las citas (index).
     */
    public function viewAny(User $user): bool
    {
        // Todos los usuarios autenticados pueden ver sus citas
        return true;
    }

    /**
     * Determina si el usuario puede ver una cita específica.
     */
    public function view(User $user, Cita $cita): bool
    {
        // Solo puede ver la cita si le pertenece
        return $user->id === $cita->user_id;
    }

    /**
     * Determina si el usuario puede crear nuevas citas.
     */
    public function create(User $user): bool
    {
        // Todos los usuarios autenticados pueden crear citas
        return true;
    }

    /**
     * Determina si el usuario puede actualizar una cita.
     */
    public function update(User $user, Cita $cita): bool
    {
        // Solo puede actualizar la cita si le pertenece
        return $user->id === $cita->user_id;
    }

    /**
     * Determina si el usuario puede eliminar una cita.
     */
    public function delete(User $user, Cita $cita): bool
    {
        // Solo puede eliminar la cita si le pertenece
        return $user->id === $cita->user_id;
    }

    /**
     * Determina si el usuario puede restaurar una cita eliminada.
     */
    public function restore(User $user, Cita $cita): bool
    {
        // Solo puede restaurar la cita si le pertenece
        return $user->id === $cita->user_id;
    }

    /**
     * Determina si el usuario puede eliminar permanentemente una cita.
     */
    public function forceDelete(User $user, Cita $cita): bool
    {
        // Solo puede eliminar permanentemente la cita si le pertenece
        return $user->id === $cita->user_id;
    }
}