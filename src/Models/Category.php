<?php

namespace Lisandrop05\Voyager\Models;

use Illuminate\Database\Eloquent\Model;
use Lisandrop05\Voyager\Facades\Voyager;
use Lisandrop05\Voyager\Traits\Translatable;

class Category extends Model
{
    use Translatable;

    protected $translatable = ['slug', 'name'];

    protected $table = 'categories';

    protected $fillable = ['slug', 'name'];

    public function posts()
    {
        return $this->hasMany(Voyager::modelClass('Post'))
            ->published()
            ->orderBy('created_at', 'DESC');
    }

    public function parentId()
    {
        return $this->belongsTo(self::class);
    }
}
