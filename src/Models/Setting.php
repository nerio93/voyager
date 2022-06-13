<?php

namespace Lisandrop05\Voyager\Models;

use Illuminate\Database\Eloquent\Model;
use Lisandrop05\Voyager\Events\SettingUpdated;

class Setting extends Model
{
    protected $table = 'settings';

    protected $guarded = [];

    public $timestamps = false;

    protected $dispatchesEvents = [
        'updating' => SettingUpdated::class,
    ];
}
