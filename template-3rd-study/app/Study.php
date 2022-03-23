<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Study extends Model
{
    protected $table = 'studies';
    public function studies()
    {
        return $this->belongsTo('App\Language');
        return $this->belongsTo('App\Content');
    }
}
