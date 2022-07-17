<?php

namespace Lisandrop05\Voyager\Policies;

use Lisandrop05\Voyager\Contracts\User;

class SettingPolicy extends BasePolicy
{
    /**
     * Determine if the given user can browse the model.
     *
     * @param User $user
     * @param  $model
     *
     * @return bool
     */
    public function browse(User $user, $model): bool
    {
        return $user->hasPermission('browse_settings');
    }

    /**
     * Determine if the given model can be viewed by the user.
     *
     * @param User $user
     * @param  $model
     *
     * @return bool
     */
    public function read(User $user, $model)
    {
        return $user->hasPermission('read_settings');
    }

    /**
     * Determine if the given model can be edited by the user.
     *
     * @param User $user
     * @param  $model
     *
     * @return bool
     */
    public function edit(User $user, $model): bool
    {
        return $user->hasPermission('edit_settings');
    }

    /**
     * Determine if the given user can create the model.
     *
     * @param User $user
     * @param  $model
     *
     * @return bool
     */
    public function add(User $user, $model): bool
    {
        return $user->hasPermission('add_settings');
    }

    /**
     * Determine if the given model can be deleted by the user.
     *
     * @param User $user
     * @param  $model
     *
     * @return bool
     */
    public function delete(User $user, $model) : bool
    {
        return $user->hasPermission('delete_settings');
    }

    /**
     * Determine if the given model can be deleted by the user.
     *
     * @param User $user
     * @param  $model
     *
     * @return bool
     */
    public function process(User $user, $model) : bool
    {
        return $user->hasPermission('process_settings');
    }
}
